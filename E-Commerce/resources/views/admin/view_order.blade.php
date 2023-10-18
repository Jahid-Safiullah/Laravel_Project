<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
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

                        <tr class="table-secondary ">
                        <th scope="col" class="text-dark">Order SL.</th>
                        <th scope="col" class="text-dark">Name</th>
                        <th scope="col" class="text-dark">Email</th>
                        <th scope="col" class="text-dark">Phone</th>
                        <th scope="col" class="text-dark">Address</th>
                        <th scope="col" class="text-dark">Product Title</th>
                        <th scope="col" class="text-dark">Image</th>
                        <th scope="col" class="text-dark">Quantity</th>
                        <th scope="col" class="text-dark">Price</th>
                        <th scope="col" class="text-dark">Payment Status</th>
                        <th scope="col" class="text-dark">Delivery Status</th>
                        <th scope="col" class="text-dark">Delivered</th>
                        <th scope="col" class="text-dark">Print PDF</th>
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
                        <td>
                            @if($orderTableData->delivery_status=='Processing')
                            <a href="{{url('delivered',$orderTableData->id)}}" class="btn btn-primary" onclick="return confirm('Are You Sure This Product is Delivered  !!!')">Delivered</a>
                            @else
                            <p style="margin-left:25%; margin-top: 12px;">
                                <i class="fa-regular fa-circle-check fa-beat fa-2xl center" style="color: #bb9e0c;  "></i>

                            </p>
                            @endif
                        </td>
                        <td>
                          <a class="btn btn-outline-light" href="{{url('print_pdf',$orderTableData->id)}}">
                          <i class="fa-regular fa-file-pdf" style="color: #bf0d0d;"></i>PDF
                          </a>
                        </td>
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
