<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $productDatas=product::paginate(3);
        return view ('home.userpage',compact('productDatas'));
    }


    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else{
            $productDatas=product::paginate(6);
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
        $cartDatas=cart::all();
        return view('home.showCart',compact('cartDatas'));
    }

    public function delete_cart_item($id){
        $delete_cart_data=cart::find($id);
        $delete_cart_data->delete();
        return redirect()->back();

    }



}
