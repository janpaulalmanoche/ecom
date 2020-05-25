@extends('layouts.frontLayout.front_design')
@section('content')


<section>
        <div class="container">
            <div class="row">
                <!--display error message -->
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="background-color:#f2dfd0">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong> {!! session('flash_message_error')!!}</strong>
                    </div>
                @endif
            <!--display error message -->
                @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong> {!! session('flash_message_success')!!}</strong>
                    </div>
                @endif
                <div class="col-sm-3">

                    {{--sidebar part--}}
                @include('layouts.frontLayout.front_sidebar')
                        <!--brands_products-->
                        <!--
                        <div class="brands_products">
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                    <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                                </ul>
                            </div>
                        </div>
                        --><!--/brands_products-->


                        <!--price-range-->
                        <!--
                        <div class="price-range">
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div>
                        --><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{asset('images/home/shipping.jpg') }}" alt="" />
                        </div><!--/shipping-->

                    </div>
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <!--iamge part o the detail pageeeeeeeeeeeeeeeeeeeeeee-->
                            <div class="view-product">
                                <img src="{{asset('images/backend_images/products/medium/'.$productdetails->image)}}" alt="" />

                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>

                                </div>

                                {{--<!-- Controls -->--}}
                                {{--<a class="left item-control" href="#similar-product" data-slide="prev">--}}
                                    {{--<i class="fa fa-angle-left"></i>--}}
                                {{--</a>--}}
                                {{--<a class="right item-control" href="#similar-product" data-slide="next">--}}
                                    {{--<i class="fa fa-angle-right"></i>--}}
                                {{--</a>--}}
                            </div>

                        </div>


                        {{--details parttttttttttttttttttttttttttttttttttt--}}
                        <div class="col-sm-7">
                            {{--addddd tooo carrttt foooorrrrmmmm--}}
                    <form name="addtocartForm" id="addtocartForm" action="{{url('add-cart')}}" method="post">{{csrf_field()}}

                        <input type="hidden" name="product_id" value="{{$productdetails->id}}">
                        {{--<input type="hidden" name="product_name" value="{{$productdetails->product_name}}">--}}
                        {{--<input type="hidden" name="product_code" value="{{$productdetails->product_code}}">--}}
                        {{--<input type="hidden" name="product_brand" value="{{$productdetails->brand}}">--}}
                        {{--<input type="hidden" name="product_price" id="price" value="{{$productdetails->price}}">--}}
                        {{--<input type="hidden" name="size" value="{{$productdetails->size}}">--}}
                        {{--<input type="hidden" name="measurement" id="price" value="{{$productdetails->measurement}}">--}}
                        {{--<img type="hidden" name="img" src="{{asset('images/backend_images/products/medium/'.$productdetails->image)}}" alt="" />--}}



                                    <div class="product-information"><!--/product-information-->
                                        <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                        <h2>{{$productdetails->product_name}}</h2>
                                        <p>Code: {{$productdetails->product_code}}</p>
                                        <p>Size: {{$productdetails->size}} {{$productdetails->measurement}}</p>
                                        {{--<p>--}}
                                            {{--<select id="selSize" name="size" style="width:150px;">--}}
                                                {{--<option value="">select size</option>--}}
                                                {{--@foreach($productdetails->attributes as $sizes)--}}
                                                    {{--<option value=" {{$productdetails->id}}-{{$sizes->size}}"> {{$sizes->size}}</option>--}}
                                                    {{--@endforeach--}}
                                            {{--</select>--}}
                                            {{--we call our productdetail var function with relation to attributes,we are passing to--}}
                                            {{--the product attributes table and renaming $product details as var $sizes and ,calling the size--}}
                                            {{--column nmae in product attribute--}}
                                        {{--</p>--}}
                                        <img src="images/product-details/rating.png" alt="" />
                                        <span>
                                            <span id="getPrice">P{{$productdetails->price}}</span>
                   <input type="hidden" value="{{$productdetails->price}}" name="product_price">
                                            <label>Quantity:</label>
                                            <input type="text" name="quantity" value="1" />

                               {{--if our stock is greater than 0 in product attribute table it will only show this add to cart button--}}
                                            @if($total_stock>0)
                                            <button type="submit" id="cartButton" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                            @endif
                                            {{--@if($total_stock>0)--}}
                                                {{--<button type="button" id="cartButton" class="btn btn-fefault cart">--}}
                                                {{--<i class="fa fa-shopping-cart"></i>--}}
                                                {{--Add to cart--}}
                                            {{--</button>--}}
                                            {{--@endif--}}
                                        </span>
                                        {{--<p><b>Availability:</b> <span id="Availability">In Stock</span></p>--}}
                                        <p><b>Availability:</b> <span id="Availability">@if($total_stock>0)In Stock @else Out of stock @endif</span></p>
                                        <p><b>Condition:</b>@if($total_stock>0) New @else  @endif</p>
                                        {{--<p><b>Brand:</b> E-SHOPPER</p>--}}
                                        <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                                    </div><!--/product-information-->
                    </form>    {{--addddd tooo carrttt foooorrrrmmmm--}}

                        </div>
                    </div><!--/product-detailssssssssssssssssssssssssss-->




                                {{--slider dedetails part--}}
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                                {{--<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>--}}
                                <li><a href="#delivery" data-toggle="tab">Status</a></li>
                                <li ><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane active in" id="description" >
                                <div class="col-sm-12">
                                    <p>{{$productdetails->description}}</p>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="delivery" >
                                <div class="col-sm-12">
                                    <p><span style="margin-left:5px">on stock</span></p>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="tag" >

                            </div>

                            <div class="tab-pane fade active in" id="reviews" >
                                <div class="col-sm-12">
                                    <ul>
                                        

                                    <form action="#">

                                </div>
                            </div>

                        </div>
                    </div><!--/category-tab-->

                    {{--for other sizes--}}


                <!--recommended_items-->

                    <div class="recommended_items"><!--other sizes-->
                        <h2 class="title text-center">other sizes</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $count=1; ?>
                                @foreach($AttributteTable->chunk(3) as $chunkz)
                                    {{--to set the limit of the display items by three--}}
                                    <div <?php if($count==1){ ?>class="item active"<?php }else{
                                    ?> class="item" <?php } ?> >

                                        @foreach($chunkz as $item)
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <a href="{{url('/product/'.$item->id)}}">  <img src="{{asset('images/backend_images/products/medium/'.$item->image)}}" style="width:230px;" alt="" /></a>
                                                            <h2>PHP{{$item->price}}</h2>
                                                            <p>{{$productdetails->product_name}}</p>
                                                            <p>{{$item->product_code}}</p>
                                                            <p>{{$item->size}}{{$item->measurement}}</p>
                                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <?php $count++; ?>

                                    </div>
                                @endforeach
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/other sizxes-->



                </div>
            </div>
        </div>
</section>
@endsection