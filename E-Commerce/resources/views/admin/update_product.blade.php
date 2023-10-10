<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
   {{-- add css part --}}
   <base href="/public">
   @include('admin.css')
   <style>
     .div_center{
        text-align:center;
        padding:40px;
        background-color:#454d55;
    }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.partial_sideber')
      <!-- partial -->
      <!-- add view/admin/navbar.blade.php -->
      @include('admin.navber')
        <!-- partial -->
<!----------------------------- add view/admin/body.blade.php ------------------------------------------------->
        <div class="main-panel">
            <div class="content-wrapper">
 <!-- after data post the message will show -->
            @if(session()->has('message'))
                  <div class="alert alert-success  alert-dismissible">
                    <button type="button" class="close" data-dismis="alert" aria-label="close">X</button>
                    {{session()->get('message')}}
                  </div>
            @endif
                  <!-- end post the Data message code -->

                <div class="div_center">
                    <h2 style="padding-bottom: 50px">Update Product</h2>

                    <form style=" " action="{{url('/update_product')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Product Title :</span>
                            <input type="text" class="form-control" name="title" placeholder="Write a Title Of Product" aria-label="product Title" aria-describedby="basic-addon1"  value="{{$UpdateProductsDetailes->title}}" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Product Description :</span>
                            <input type="text" name="description" class="form-control"  placeholder="Write a Description" aria-label="product description" aria-describedby="basic-addon1" value="{{$UpdateProductsDetailes->description}}" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Product Price :</span>
                            <input type="number" name="price" class="form-control"  placeholder="Write a Price" aria-label="product Price" aria-describedby="basic-addon1" value="{{$UpdateProductsDetailes->price}}" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Discount Price :</span>
                            <input type="number" name="dis_price" class="form-control"  placeholder="Write Discount Price If Applicable" aria-label="product discount Price" aria-describedby="basic-addon1" value="{{$UpdateProductsDetailes->discount_price}}" require>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"  id="basic-addon2">Product Quantity :</span>
                            <input type="number" name="quantity" class="form-control" placeholder="Write a Quantity" aria-label="product quantity " aria-describedby="basic-addon2" value="{{$UpdateProductsDetailes->quantity}}" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Product Catagory :</span>
                            <select class="form-control" name="catagory" aria-label="Default select example"  required>
                                <option value="{{$UpdateProductsDetailes->catagory}}" selected>{{$UpdateProductsDetailes->catagory}}</option>

                                $@foreach ($catagories as $catagory)
                                <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"  id="basic-addon3">Current Product Image Here :</span>
                           <img style="height: 100Px, width:100px" height="100px" width="100px" src="/product/{{$UpdateProductsDetailes->image}}" alt="image">
                            {{-- <input type="file" name="image" class="form-control"   aria-label="product image " aria-describedby="basic-addon3"  required> --}}
                        </div>



                        <div class="input-group mb-3">
                            <span class="input-group-text"  id="basic-addon3">If You Add New Product Image:</span>
                            <input type="file" name="image" class="form-control"   aria-label="product image " aria-describedby="basic-addon3"  >
                        </div>



                        <div>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>


                    </form>
                </div>

            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
