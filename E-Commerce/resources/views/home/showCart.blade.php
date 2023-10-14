<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <!--css part-->
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->



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
                                <td>{{ $cartData->id }}</td>
                                <td>{{ $cartData->product_title }}</td>
                                <td class="">
                                    <img style="width: 10%; height:10%" src="/product/{{ $cartData->image }}"
                                        alt="">
                                </td>
                                <td>{{ $cartData->quantity }}</td>
                                <td>$ {{ $cartData->price }}</td>
                                <td><a class="btn btn-danger" href="{{url('/delete_cart_item', $cartData->id)}}">Delete</a></td>


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
                        </tr>
                    </tfoot>


                </table>


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
