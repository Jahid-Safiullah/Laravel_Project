<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
   @include('admin.css')
   <style>
    .customer_detailes{

    }

   </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div class="main-panel">
            <div class="content-wrapper">

            <div >
                    <h2 class="text-center">HEARE<span style="color: red"> {{$allOrderProduct[0]->name}}</span> ALL PRODUCT ORDERED TABLE</h2>
            </div>
            <div class="border border-light">

                <table class="table table-borderless table-hover table-dark table-striped">

                    <tbody>
                      <tr>
                        <th class="customer_detailes" scope="row">Order ID :</th>
                        <td > {{$allOrderProduct[0]->order_id}}</td>

                      </tr>
                      <tr>
                        <th class="customer_detailes" scope="row">Customer Name :</th>
                        <td>{{$allOrderProduct[0]->name}}</td>

                      </tr>
                      <tr>
                        <th class="customer_detailes" scope="row">Customer Email :</th>
                        <td >{{$allOrderProduct[0]->email}}</td>

                      </tr>
                      <tr>
                        <th class="customer_detailes" scope="row">Phone Numebr :</th>
                        <td >{{$allOrderProduct[0]->phone}}</td>

                      </tr>
                      <tr>
                        <th class="customer_detailes" scope="row">Address :</th>
                        <td >{{$allOrderProduct[0]->address}}</td>

                      </tr>
                    </tbody>
                  </table>
            </div>
          <div class="table-responsive ">
            <table class="table table-bordered table-hover table-dark table-striped">
                  <thead>
                  <tr class="table-secondary ">
                        <th scope="col" class="text-dark">id</th>
                        <th scope="col" class="text-dark">P.Title</th>
                        <th scope="col" class="text-dark">Quantity</th>
                        <th scope="col" class="text-dark">Price</th>
                        <th scope="col" class="text-dark">Payment Status</th>
                        <th scope="col" class="text-dark">Delivery Status</th>
                        <th scope="col" class="text-dark">Delivered</th>

                        {{-- <th scope="col" class="text-dark">Print PDF</th> --}}
                        </tr>
                  </thead>
                  <tbody>
                        @php
                          $totalPrice=0;
                          $totalProduct=0;
                        @endphp
                    @foreach($allOrderProduct as $orderTableData)

                        <tr>
                          <td>{{$orderTableData->id}}</td>
                          <td>{{$orderTableData->product_title}}</td>
                          <td>{{$orderTableData->quantity}} P</td>
                          <td>$ {{$orderTableData->price}}</td>

                          <td>{{$orderTableData->payment_status}}</td>
                          <td>{{$orderTableData->delivery_status}}</td>
                          <td>

                                @if ($orderTableData->delivery_status=='Processing')
                                    <a onclick="" class="btn btn-warning" href="{{url('/delivered',$orderTableData->id)}}">Delivered</a>
                                @else
                                    <i class="fa-regular fa-square-check" style="color: #229e00;"></i>
                                @endif

                          </td>
                        </tr>

                        @php
                          $totalPrice=$totalPrice + $orderTableData->price;
                          $totalProduct=$totalProduct + $orderTableData->quantity;
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot style="border-top:3px dashed rgb(255, 255, 255)">

                        <tr>
                            <td colspan="3"> <b>Total <span style="color: rgb(0, 173, 58)">{{$totalProduct}} P. product </span> Amount --------</b></td>
                            <td> <b style="color: rgb(0, 173, 58)">$ {{$totalPrice}}</b></td>
                            <td colspan="2">Print PDF -----------</td>
                            <td > <a class="btn btn-outline-success" href="{{url('print_pdf',$allOrderProduct[0]->order_id)}}"><i class="fa-regular fa-file-pdf" style="color: #bd0a0a;"> </i>PDF </a> </td>
                        </tr>

                    </tfoot>
              </table>
          </div>
            </div>
        </div>



    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
