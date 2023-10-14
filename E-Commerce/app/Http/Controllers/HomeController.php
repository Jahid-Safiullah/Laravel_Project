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
        $productDatas=product::paginate(6);
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
        // $cart_datas=cart::find($id);
        // $cart_datas->name=$request->name;
        // $cart_datas->email=$request->email;
        // $cart_datas->address=$request->address;
        // $cart_datas->product_title=$request->product_title;
        // $cart_datas->product_catagory=$request->product_catagory;
        // $cart_datas->price=$request->price;
        // $cart_datas->quantity=$request->quantity;
        // $cart_datas->image=$request->image;
        // $cart_datas->product_details=$request->product_details;
        return redirect()->back();
       }
       else{
        return redirect('login');
       }
    }



}
