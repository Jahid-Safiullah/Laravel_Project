<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

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


<!-- -----after data Delete the message will show --->
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
            </div>
        @endif
  <!----------- end post the Data message code -->





    <div class="">
        <h2 class="text-center">SHOW PRODUCT TABLE</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-striped border border-white table-hover">
            <thead>
                <tr class="table-secondary">
                    <th scope="col" class="text-dark">No.</th>
                    <th scope="col" class="text-dark">Product Title</th>
                    <th scope="col" class="text-dark">Product Description</th>
                    <th scope="col" class="text-dark">Product Price</th>
                    <th scope="col" class="text-dark">Discount Price</th>
                    <th scope="col" class="text-dark">P. Quantity</th>
                    <th scope="col" class="text-dark">P. Catagory</th>
                    <th scope="col" class="text-dark">P. Image</th>
                    <th scope="col" class="text-dark">Update</th>
                    <th scope="col" class="text-dark">Delete</th>

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
                    <td> <img src="/product/{{$product->image}}" alt="{{$product->image}}" > </td>
                    <td> <a class="btn btn-primary" href="{{url('update_product',$product->id)}}">Update</a> </td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are you Sure Delete The Data?')"href="{{url('delete_product',$product->id)}}">Delete</a></td>


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
