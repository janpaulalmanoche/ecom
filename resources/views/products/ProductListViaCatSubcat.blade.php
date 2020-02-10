@extends('layouts.frontLayout.front_design')
@section('content')


    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>SHOP ONLINE</h1>
                                    <h2>Quality Service</h2>

                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset ('images/frontend_images/home/slider1.jpg') }}" class="girl img-responsive" alt="" />
                                    {{--<img src="{{asset ('images/frontend_images/home/pricing.png') }}"  class="pricing" alt="" />--}}
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>SHOP ONLINE</h1>
                                    <h2>Quality Service</h2>

                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('images/frontend_images/home/slider2.jpg') }}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('images/frontend_images/home/pricing.png') }}"  class="pricing" alt="" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>SHOP ONLINE</h1>
                                    <h2>Quality Service</h2>

                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('images/frontend_images/home/slider3.jpg') }}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('images/frontend_images/home/pricing.png') }}" class="pricing" alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                    {{--sidebar parthere--}}
                @include('layouts.frontLayout.front_sidebar')



                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{asset('images/home/shipping.jpg') }}" alt="" />
                        </div><!--/shipping-->

                    </div>
                </div>
                <!--features_items this is where we show our products-->
            {{--display products when you click the main cat or sub cat--}}
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">{{$categoryDetails->name}}</h2>

                    @foreach($productsAll as $product) <!-- $productsAll  variable name in our function un controller-->
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url('/product/'.$product->id)}}"> <img src="{{asset('images/backend_images/products/small/'.$product->image)}}" alt="" /></a>
                                        <h2>P{{$product->price}}</h2><!-- price-->
                                        <p>{{$product->product_name}}</p><!-- name-->
                                        <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        {{--<li><a href="{{url('/product/'.$product->id)}}"><i class="fa fa-plus-square"></i>View Details</a></li>--}}
                                        {{--we can usr this one--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <!--show products CLOSSING-->


                </div>
            </div>
        </div>
    </section>


@endsection