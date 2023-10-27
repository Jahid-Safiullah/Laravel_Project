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
                        <th scope="col" class="text-dark">ID</th>
                        <th scope="col" class="text-dark">Name</th>
                        <th scope="col" class="text-dark">Email</th>
                        <th scope="col" class="text-dark">Phone</th>
                        <th scope="col" class="text-dark">Address</th>
                        <th scope="col" class="text-dark">Payment Status</th>
                        <th scope="col" class="text-dark">Delivery Status</th>
                        <th scope="col" class="text-dark">Order Detailes</th>
                        <th scope="col" class="text-dark">Print PDF</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($orderTable as $orderTableData)
                        <tr>
                        <td>{{$orderTableData[0]->order_id}} </td>
                        <td>{{$orderTableData[0]->id}} </td>
                        <td>{{$orderTableData[0]->name}} </td>
                        <td>{{$orderTableData[0]->email}}</td>
                        <td>{{$orderTableData[0]->phone}}</td>
                        <td>{{$orderTableData[0]->address}}</td>
                        <td>{{$orderTableData[0]->payment_status}}</td>
                        <td>
                            {{$orderTableData[0]->delivery_status}}
                        </td>

                        <td> <a class="btn btn-primary" href="/view_order/{{$orderTableData[0]->order_id}}">Order Detailes</a> </td>
                        <td> <a class="btn btn-outline-success" href="{{url('print_pdf',$orderTableData[0]->order_id)}}"><i class="fa-regular fa-file-pdf" style="color: #bd0a0a;"></i>PDF</a></td>

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
