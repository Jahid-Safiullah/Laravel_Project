<section class="product_section layout_padding" id="product">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>

          <div class="">
            <form  class="input-group mb-3" action="{{url('search')}}" method="GET">
                @csrf
                <input style="width:700px;  border-bottom-left-radius: 25px; border-top-left-radius: 25px;"  name="search" type="text" class="form-control" placeholder="Search Your Product...." aria-label="Search Your Product" aria-describedby="button-addon2">
                <button style="border-bottom-right-radius: 25px; border-top-right-radius: 25px;" class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </form>
          </div>

       </div>


       <div class="row" >

            @foreach($productDatas as $productData)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                        <div class="options"  >
                            <a href="{{url('/product_details',$productData->id)}}" class="option1">
                           Product Details
                            </a>

                            <form action="{{url('/add_cart', $productData->id)}}" method="Post">
                           @csrf
                            <div class="row ">
                                <div class="col-md-4 rounded-pill ">
                                    <input class="rounded-pill " type="number" name="quantity" value="1" min="1" style="width:70px; padding: 12px;">
                                </div>
                                <div class="col-md-4 rounded-pill">
                                    <input class="rounded-pill  btn btn-outline-primary  " type="submit" value="add to Cart" style="padding: 12px;">
                                </div>
                            </div>
                            </form>
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
<!----------------------------------------- ------- for pagination link -------------------------------------------- -->

                {{-- <!-- - {!!$productDatas->appends(Request::all())->links()!!} -- --> --}}

                <!-- ------ this one is boostrap pagination --------- -->

                {{-- {!!$productDatas->withQueryString()->links('pagination::bootstrap-5')!!} --}}

 <!-- ----------------------------------------------- end Pgination links  ----------------------------------------->



       </div>







    </div>
 </section>
