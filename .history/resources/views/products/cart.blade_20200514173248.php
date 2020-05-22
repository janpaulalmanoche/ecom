@extends('layouts.frontLayout.front_design')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
                @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong> {!! session('flash_message_success')!!}</strong>
                    </div>
                @endif

                @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="background-color:#f2dfd0">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong> {!! session('flash_message_error')!!}</strong>
                    </div>
                @endif

            </div>



            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    {{--where we display our product--}}
                    {{--$userCart is in our carp public function
                                                 where producrs session_id is eqault to var session_id--}}
                    <form action="{{url('/admin/minus-quantity-stocks')}}" method="post">{{csrf_field()}}
                        <?php $total_amount = 0; ?>
                        @foreach($userCart as $cart)
                            @foreach($cart->cartprod as $prod)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img style="width:100px;" src="{{asset('images/backend_images/products/small/'.$prod->image)}}" alt=""></a>
                                </td>

                                <td class="cart_description">
                                    <h4><a href="">{{$prod->product_name}}</a></h4>
                                    <p>Code:{{$prod->product_code}} | Size:{{$prod->size}} {{$prod->measurement}}</p>

                                </td>
                                <td class="cart_price">
                                    <p>P{{$cart->resell_price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}"> + </a>
                                        <input class="cart_quantity_input" type="text"
                                               name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2">

                                        @if($cart->quantity>1)
                                            <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}"> - </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">P{{$cart->price*$cart->quantity}}</p>
                                    {{--price x quantity to get the total--}}
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url('/cart/delete-product/'.$cart->id)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>

                    <?php $total_amount = $total_amount + ($prod->price*$cart->quantity); ?>
                    @endforeach
                    @endforeach

                    {{--where we display our product--}}
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">

                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            {{--<li>Cart Sub Total <span>$59</span></li>--}}
                            {{--<li>Eco Tax <span>$2</span></li>--}}
                            {{--<li>Shipping Cost <span>Free</span></li>--}}
                            <li>Total <span>P<?php echo $total_amount; ?></span></li>
                        </ul>
                        {{--<a class="btn btn-default update" href="">Update</a>--}}
                        {{--<a class="btn btn-default check_out" href="{{url('/checkout')}}">Check Out</a>--}}
                        <input class="btn btn-default update" type="submit" value="Checkout">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section><!--/#do_action-->


@endsection