<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.partial_sideber')
      <!-- partial -->
      <!-- add view/admin/navbar.blade.php -->
      @include('admin.navber')
        <!-- partial -->
        <!-- add view/admin/body.blade.php -->

        <!-- @if (session()->has('massege')) -->

            <!-- <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button> -->
            <script>
              if(){
                swal("Good job!", "You clicked the button!", "success")
              }
              else{
                swal("Bad job!", "You clicked the button!", "success")
              }
               
                // swal('massege',' {{session()->get('massege')}}','success',{
                //     button:true,
                //     button:'ok',
                // });
            </script>
            

                    

          

        <!-- @endif -->



        <div class="main-panel">
            <div class="content-wrapper">


            
            <div >
                    <h2 class="text-center">SHOW ORDERED TABLE</h2>
            </div>
                <div class="table-responsive ">
                <table class="table table-dark table-striped table-hover " >
                    
                    <thead >
                       
                        <tr class="table-secondary">
                        <th scope="col">Order SL.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Delivery Status</th>
                        <th scope="col">Delivered</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($orderTable as $orderTableData)
                        <tr>
                        <td>{{$orderTableData->id}} </td>
                        <td>{{$orderTableData->name}} </td>
                        <td>{{$orderTableData->email}}</td>
                        <td>{{$orderTableData->phone}}</td>
                        <td>{{$orderTableData->address}}</td>
                        <td>{{$orderTableData->product_title}}</td>
                        <td><img src="/product/{{$orderTableData->image}}" alt="{{$orderTableData->image}}"></td>
                        <td>{{$orderTableData->quantity}}</td>
                        <td>{{$orderTableData->price}}</td>
                        <td>{{$orderTableData->payment_status}}</td>
                        <td>{{$orderTableData->delivery_status}}</td>
                        <td><a href="{{url('delivered',$orderTableData->id)}}" class="btn btn-primary">Delivered</a></td>
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