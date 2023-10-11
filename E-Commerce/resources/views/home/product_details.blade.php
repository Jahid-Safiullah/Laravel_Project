<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <!--this is css part--->
      @include('home.css')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->


         <section class="product_section layout_padding ">
            <div class="container">
               <div class="heading_container heading_center">
                  <h2>
                    Product <span>Details</span>
                  </h2>
               </div>

               <div class="row ">


                        <div class="col-sm-6 col-md-4 col-lg-4 ">
                            <div class="box ">
                                <div class="img-box">
                                    <img src="/product/{{$product_details_data->image}}" alt="">
                                </div>

                            </div>
                        </div>




                       <div class=" border border-4 bg-light rounded" style="margin-top: 33px; width:66%">
                                <div class=" m-5 d-flex ">

                                    <div class="detail-box ">

                                        <span>Product Name : </span>
                                        <h5>{{$product_details_data->title}}</h5>

                                        <span>Product Catagory/Taype : </span>
                                        <p> <strong> {{$product_details_data->catagory}} </strong> </p>

                                        <span>Product Description : </span>
                                        <p>  {{$product_details_data->description}}  </p>

                                    </div>

                                    <div class="detail-box " style="padding-left: 170px">

                                        <span>Product In Stock : </span>
                                        <p>{{$product_details_data->quantity}} p. </p>


                                        @if($product_details_data->discount_price!=null)
                                        <span>Product  Discount Price : </span>
                                            <h6 style="color:red;">
                                                $ {{$product_details_data->discount_price}}
                                            </h6>
                                            <span>Product  Price : </span>
                                            <h6 style="text-decoration:line-through; color:blue;" >
                                                $ {{$product_details_data->price}}
                                            </h6>

                                            @else

                                            <h6 style="color:blue" >
                                                $ {{$product_details_data->price}}
                                            </h6>

                                        @endif

                                    </div>



                                </div>

                                <div class="">
                                    <div class="" style="justify-content: center, align-item:center">
                                        <a href="{{url('/product_details',)}}" class="btn btn-outline-primary">
                                         Add to Cart
                                        </a>

                                    </div>
                                </div>


                       </div>
               </div>


            </div>

         </section>





      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://github.com/Jahid-Safiullah">Famms</a><br>
         </p>
      </div>
    <!--this is js part-->
    @include('home.js')
   </body>
</html>

