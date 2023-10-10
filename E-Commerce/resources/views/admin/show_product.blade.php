<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  <style>
     .div_center{
        margin-bottom:5px;
        text-align:center;
        padding:10px;
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
<!---------------------------------------------- add view/admin/body.blade.php ------------------------------------->
<div class="main-panel ">
    <div class="content-wrapper">


    <div class="div_center">
                    <h2>SHOW PRODUCT</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-striped border border-white">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Discount Price</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Catagory</th>
                    <th scope="col">Product Image Here</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>$ {{$product->price}} </td>
                    <td>$ {{$product->discount_price}} </td>
                    <td>{{$product->quantity}} P</td>
                    <td>{{$product->catagory}}</td>
                    <td>
                        <img src="/product/{{$product->image}}" alt="{{$product->image}}" >
                    </td>
                    <td> <a href="{{url('delete_product',$product->id)}}">Update</a> </td>
                    <td><a href="{{url('delete_product',$product->id)}}">Delete</a></td>
                   
                </tr>
                @endforeach
               
              
            </tbody>
        </table>
    </div>
       
    </div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>