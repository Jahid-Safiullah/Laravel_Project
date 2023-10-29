<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use PDF;

// use DB;
// use Illuminate\Http\Requests;


class AdminController extends Controller
{
//--------------------------------------------Start Catagory Purpose-------------------------------------

//for add catagory form to database catagory table
    public function add_catagory(Request $request){
        $data=new catagory;
        $data->catagory_name=$request->catagory;
        $data->save();
        return redirect()->back()->with('message','Catagory added Successfully');
    }


// from database catagory table to view catagory data
    public function view_catagory(){
        $data=catagory::all();
        return view('admin.catagory',compact('data'));
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

//-------------------------------------------End Catagory Purpose---------------------------------------------



// -------------------------------------Start product purpose--------------------------------------------------



//view main product blade file and get data from catagories table by catagory Model for product catagory dropdown option.
//for add product page view option catagory tabel from database
    public function view_product(){
        $catagories=catagory::all();
        return view('admin.product', compact('catagories'));
    }




//for request add product to database
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




//for show product from database
    public function show_product(){
        $products=product::all();
        return view('admin.show_product',compact('products'));
    }



 //for delete product
    public function delete_product($id){
        $products=product::find($id);
        $products->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');

    }




//for update product
    public function update_product( $id){
        $UpdateProductsDetailes=product::find($id);
        $catagories=catagory::all();
        return view('admin.update_product',compact('UpdateProductsDetailes','catagories'));
    }




//for request update product send to database
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

//----------------------------------------End Product purpose---------------------------------------------


//----------------------------------------Start Order purpose------------------------------------------------




//view order tabel
    public function order(){

        $orderTable= Order::all()->groupBy('order_id')->sortByDesc('id'); //can't use orderBY or sortBy why????
        // dd(compact('orderTable'));
        return view('admin.order',compact('orderTable'));
    }





// view all product that ordered detailes
    public function view_order($order_id){

        $allOrderProduct=Order::where('order_id',$order_id)->get();
        // dd($allOrderProduct->toArray());
        // dd(compact('allOrderProduct'));
        return view ('admin.order_all_product',compact('allOrderProduct'));
    }

//--------------------------------------------End order purpose-----------------------------------------------



//---------------------------------------------Start Delivery purpose----------------------------------------



//for delivered button and change the processing to Delivered
    public function delivered($id){
        $orderTable=order::find($id);
        $orderTable->delivery_status='Delivered';

        // if($orderTable=order::where('payment_status','==','Cash on delivery')->get();){
        //     $orderTable->payment_status='Paid';
        // }


        // if($orderTable->payment_status . '==' . 'Cash on delivery'){
        //     $orderTable->payment_status='Paid';
        // }
        // else{
        //     $orderTable->payment_status='Paid BY Card';
        // }

        $orderTable->save();
        return redirect()->back()->with('massege','Delivered Sucessfully');
    }
//-------------------------------------------------End Delivery Purpose------------------------------------------



//-------------------------------------------------Start PDF Purpose-----------------------------------------


 //for pdf---
    public function print_pdf($order_id){
        $orderDatas=order::where('order_id',$order_id)->get();

        $print_pdf=PDF::loadView('admin.pdf_order_delivered',compact('orderDatas'));
    return $print_pdf->download( $orderDatas[0]->order_id . '. ' . $orderDatas[0]->name.'-'.$orderDatas[0]->address);

    }
//--------------------------------------------------End PDF Purpose-------------------------------------------------






}
