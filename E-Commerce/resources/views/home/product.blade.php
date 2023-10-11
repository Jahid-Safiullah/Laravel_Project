<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>

       <div class="row">

            @foreach($productDatas as $productData)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                        <div class="options">
                            <a href="{{url('/product_details',$productData->id)}}" class="option1">
                           Product Details
                            </a>
                            <a href="{{url('/add_cart', $productData->id)}}" class="option2">
                            Buy Now
                            </a>
                        </div>
                        </div>
                        <div class="img-box">
                        <img src="/product/{{$productData->image}}" alt="">
                        </div>
                        <div class="detail-box">
                        <h5>
                        {{$productData->title}}
                        </h5>



                        @if($productData->discount_price!=null)

                            <h6 style="color:red;">
                                $ {{$productData->discount_price}}
                            </h6>
                            <h6 style="text-decoration:line-through; color:blue;" >
                                $ {{$productData->price}}
                            </h6>

                            @else

                            <h6 style="color:blue" >
                                $ {{$productData->price}}
                            </h6>

                        @endif


                        </div>
                    </div>
                </div>

                @endforeach
                {{-- ------------------- for pagination link - -----}}

                {{-- {!!$productDatas->appends(Request::all())->links()!!} --}}

                {{--------- this one is boostrap pagination ----------------}}

                {!!$productDatas->withQueryString()->links('pagination::bootstrap-5')!!}

                {{------------- end Pgination links  --------------}}


                <!-- <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                        <div class="options">
                            <a href="" class="option1">
                            Add To Cart
                            </a>
                            <a href="" class="option2">
                            Buy Now
                            </a>
                        </div>
                        </div>
                        <div class="img-box">
                        <img src="home/images/p2.png" alt="">
                        </div>
                        <div class="detail-box">
                        <h5>
                            Men's Shirt
                        </h5>
                        <h6>
                            $80
                        </h6>
                        </div>
                    </div>
                </div> -->

       </div>
       <!-- <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div> -->







    </div>
 </section>
