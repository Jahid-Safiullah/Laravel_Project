<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;

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
}
