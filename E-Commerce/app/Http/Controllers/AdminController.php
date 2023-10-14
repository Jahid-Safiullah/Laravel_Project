<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;

// use DB;
// use Illuminate\Http\Requests;


class AdminController extends Controller
{
    public function view_catagory(){
        $data=catagory::all();
        return view('admin.catagory',compact('data'));
    }

    public function add_catagory(Request $request){
        $data=new catagory;
        $data->catagory_name=$request->catagory;
        $data->save();
        return redirect()->back()->with('message','Catagory added Successfully');
    }
    public function delete_catagory($id){
        $data=catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message','Catagory Deleted Successfully');
    }

    // public function delete_catagory($id){
    //    DB::delete('delete from student where id =?',[$id]);
    //    echo "Record deleted successfully.<br/>";
    //    echo '<a href= "/delete-records">Click Here</a> to go back.';
    // }

    // ----for product purpose-------
    //view main product blade file and get data from catagories table by catagory Model for product catagory dropdown option.
    public function view_product(){
        $catagories=catagory::all();
        return view('admin.product', compact('catagories'));
    }

    public function add_product(Request $request ){
        $product=new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->catagory=$request->catagory;
        $product->quantity=$request->quantity;
        $product->price=$request->price;

        $product->discount_price=$request->dis_price;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        // $product->image=$request->image->move('product',time().'.'.$request->image->getClientOriginalExtension());

        $product->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }
    public function show_product(){
        $products=product::all();
        return view('admin.show_product',compact('products'));
    }
    public function delete_product($id){
        $products=product::find($id);
        $products->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');

    }
    public function update_product( $id){
        $UpdateProductsDetailes=product::find($id);
        $catagories=catagory::all();
        return view('admin.update_product',compact('UpdateProductsDetailes','catagories'));
    }
    public function update_product_add_to_database_table(Request $request, $id){
        $updateProductDatas=product::find($id);
        $updateProductDatas->title=$request->title;
        $updateProductDatas->description=$request->description;
        $updateProductDatas->catagory=$request->catagory;
        $updateProductDatas->quantity=$request->quantity;
        $updateProductDatas->price=$request->price;
        $updateProductDatas->discount_price=$request->dis_price;

        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $updateProductDatas->image=$imagename;
        }

        $updateProductDatas->save();
        return redirect()->back();



    }

}
