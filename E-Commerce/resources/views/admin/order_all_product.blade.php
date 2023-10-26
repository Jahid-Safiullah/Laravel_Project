<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
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
        <!-- add view/admin/body.blade.php -->
        <div class="main-panel">
            <div class="content-wrapper">

            <div >
                    <h2 class="text-center">SHOW {{$allOrderProduct->name}} ORDERED TABLE</h2>
            </div>
          <div class="table-responsive ">
            <table class="table">
                  <thead>
                  <tr class="table-secondary ">
                        <th scope="col" class="text-dark">Order SL.</th>
                        
                        <th scope="col" class="text-dark">Name</th>
                        <th scope="col" class="text-dark">Email</th>
                        <th scope="col" class="text-dark">Phone</th>
                        <th scope="col" class="text-dark">Address</th>
                        <th scope="col" class="text-dark">P.Title</th>
                        
                        <th scope="col" class="text-dark">Quantity</th>
                        <th scope="col" class="text-dark">Price</th>
                        <th scope="col" class="text-dark">Payment Status</th>
                        <th scope="col" class="text-dark">Delivery Status</th>
                        <th scope="col" class="text-dark">Delivered</th>
                        
                        <th scope="col" class="text-dark">Print PDF</th>
                        </tr>
                  </thead>
                  <tbody>
                   
                    @foreach($allOrderProduct as $orderTableData)
                        <tr>
                        <td>{{$orderTableData->order_id}} </td>
                       
                        <td>{{$orderTableData->name}} </td>
                        <td>{{$orderTableData->email}}</td>
                        <td>{{$orderTableData->phone}}</td>
                        <td>{{$orderTableData->address}}</td>
                        <td>{{$orderTableData->product_title}}</td>
                        <td>{{$orderTableData->quantity}} P</td>
                        <td>$ {{$orderTableData->price}}</td>
                        <td>{{$orderTableData->payment_status}}</td>
                        <td>{{$orderTableData->delivery_status}}</td>
                        <td>{{$orderTableData->delivery_status}}</td>
                        
                      
                        
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