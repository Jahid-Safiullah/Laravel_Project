<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <!--css part-->
    @include('home.css')

<style>
 table tbody td  .counter{
 width: 100%;
 display: flex;
 justify-content: space-between;
 align-items: center;
}
table tbody td .bt{
 width: 30px;
 height: 30px;
 border-radius: 50%;
 background-color: #d9d9d9;
 display: flex;
 justify-content: center;
 align-items: center;
 font-size: 20px;
 font-family: ‘Open Sans’;
 font-weight: 900;
 color: #202020;
 cursor: pointer;
}
table tbody td .count{
 font-size: 20px;
 font-family: ‘Open Sans’;
 font-weight: 900;
 color: #202020;
}
</style>

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->


    @if (session()->has('massege'))

        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{session()->get('massege')}}
        </div >

    @endif
        <div class="table-responsive  ">
            <div class="heading_container heading_center">
                <h2>
                    Your <span> Cart List</span>
                </h2>
            </div>
            <div class=" d-flex justify-content-center">
                <table class="table  table-striped table-hover rounded col-md-8  shadow-lg p-3 mb-5 bg-body text-center">


                    <thead >

                        <tr class="">

                            <th scope="col">Cart List</th>
                            <th scope="col">Product Title</th>

                            <th scope="col">Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php
                            $totalPrice=0;
                            $totalQuantity=0;
                       @endphp


                        @foreach ($cartDatas as $cartData)
                            <tr class="">
                                <td>1</td>
                                <td colspan="">{{ $cartData->product_title }}</td>
                                <td class="">
                                    <img style="width: 10%; height:10%" src="/product/{{ $cartData->image }}"
                                        alt="">
                                </td>
                                <td >
                                    <div class="counter">
                                        <div class="bt">+</div>
                                        <div class="count">{{ $cartData->quantity }}</div>
                                        <div class="bt">-</div>
                                    </div>
                                </td>
                                <td>$ {{ $cartData->price }}</td>
                                <td><a onclick="return confirm('Are You Sure Delete Your Cart Listed Product?')" class="btn btn-danger" href="{{url('/delete_cart_item', $cartData->id)}}">Delete</a></td>


                            </tr>
                            @php
                                $totalQuantity=$totalQuantity + $cartData->quantity;
                                $totalPrice=$totalPrice + $cartData->price;
                            @endphp
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr class="text-success">
                            <th  scope="row" colspan="4"><span class="text-danger">Total Price</span> Of Your Cart Listed <span>{{$totalQuantity}}</span> Products</th>

                            <td><b>$ {{$totalPrice }}</b></td>
                            <td><a href="{{'/show_order'}}"></a></td>
                        </tr>
                    </tfoot>


                </table>


            </div>
            <div class="container">
                <div class="row">
                    <div class="col align-self-end ">
                        <div class="heading_container heading_center ">
                            <h4 class="">
                                Procced to <span class="text-danger"> Order</span>
                            </h4>
                        </div>
                        <div style="width:60% ; height:2px; background-color:darkolivegreen; margin:auto; " class=" centered"></div>

                        <div class="d-flex justify-content-center">
                            <a href="{{url('/cash_order')}}" class="btn btn-primary m-3">Cash On Delivery</a>
                            <a href="{{url('stripe',$totalPrice)}}" class="btn btn-primary m-3">Pay Using Card</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>




    </div>

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://github.com/Jahid-Safiullah">Famms</a><br>
        </p>
    </div>

    <!--js file-->
    @include('home.js')

</body>

</html>
