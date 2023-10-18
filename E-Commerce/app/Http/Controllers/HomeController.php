<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
//for strip------
use Session;
use Stripe;

class HomeController extends Controller
{
    public function index(){
        $productDatas=product::paginate(6);
        return view ('home.userpage',compact('productDatas'));
    }


    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            $product_data=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $total_order_prices=order::all();
            $price=0;
            foreach($total_order_prices as $total_order_price)
            {
                $price=$price+$total_order_price->price;
            }

            $delivered_order=order::where('delivery_status','=','Delivered')->get()->count();
            $processing_order=order::where('delivery_status','!=','Delivered')->get()->count();
            return view('admin.home',compact('product_data','total_order','total_user','price','delivered_order','processing_order'));
        }
        else{
            $productDatas=product::paginate(9);
            return view ('home.userpage',compact('productDatas'));
        }
    }

    public function product_details($id){
        $product_details_data=product::find($id);
        return view('home.product_details',compact('product_details_data'));


    }
    public function add_cart(Request $request, $id){
       if(Auth::id()){
        $user=Auth::user();
        $product=product::find($id);
        $cart=new cart;

        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->user_id=$user->id;

        $cart->product_title=$product->title;
        $cart->product_catagory=$product->product_catagory;

        if($product->discount_price!=null){
            $cart->price=$product->discount_price * $request->quantity;
        }
        else{
            $cart->price=$product->price * $request->quantity;
        }
        $cart->image=$product->image;
        $cart->product_id=$product->id;

        $cart->quantity=$request->quantity;

        $cart->save();
        return redirect()->back();
       }
       else{
        return redirect('login');
       }
    }
    public function show_cart(){
       if(Auth::id()){
        $id=Auth::user()->id;
        $cartDatas=cart::where('user_id','=',$id)->get();
        return view('home.showCart',compact('cartDatas'));
       }
       else{
        return redirect('login');
       }
    }

    public function delete_cart_item($id){
        $delete_cart_data=cart::find($id);
        $delete_cart_data->delete();
        return redirect()->back();

    }

    //for user order by Cash ON delivery
    public function cash_order(){

         $userid=Auth::user()->id;
         $cartDatas=cart::where('user_id','=',$userid)->get();

        foreach($cartDatas as $cartData){
            $orderTabel=new order;
            $orderTabel->name=          $cartData->name;
            $orderTabel->email=         $cartData->email;
            $orderTabel->phone=         $cartData->phone;
            $orderTabel->address=       $cartData->address;
            $orderTabel->user_id=       $cartData->user_id;

            $orderTabel->product_title= $cartData->product_title;
            $orderTabel->price=         $cartData->price;
            $orderTabel->quantity=      $cartData->quantity;
            $orderTabel->image=         $cartData->image;
            $orderTabel->product_id=    $cartData->product_id;

            $orderTabel->payment_status=         'Cash on delivery';
            $orderTabel->delivery_status=         'Processing';

            $orderTabel->save();

            $cart_id=$cartData->id;
            $delete_cart_id=cart::find($cart_id);
            $delete_cart_id->delete();
        }
        return redirect()->back()->with('massege','We have received your order. We will connect with you soon....');
    }


    //user order by using card (strip)-----

    public function stripe($totalPrice){
        return view('home.stripe',compact('totalPrice'));
    }

    public function stripePost(Request $request,$totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalPrice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for your Payment"
        ]);



        $userid=Auth::user()->id;
        $cartDatas=cart::where('user_id','=',$userid)->get();

       foreach($cartDatas as $cartData){
           $orderTabel=new order;
           $orderTabel->name=          $cartData->name;
           $orderTabel->email=         $cartData->email;
           $orderTabel->phone=         $cartData->phone;
           $orderTabel->address=       $cartData->address;
           $orderTabel->user_id=       $cartData->user_id;

           $orderTabel->product_title= $cartData->product_title;
           $orderTabel->price=         $cartData->price;
           $orderTabel->quantity=      $cartData->quantity;
           $orderTabel->image=         $cartData->image;
           $orderTabel->product_id=    $cartData->product_id;

           $orderTabel->payment_status= 'Paid BY Card';
           $orderTabel->delivery_status='Processing';

           $orderTabel->save();

           $cart_id=$cartData->id;
           $delete_cart_id=cart::find($cart_id);
           $delete_cart_id->delete();
       }


        Session::flash('success', 'Payment successful!');

        return back();
    }


}
