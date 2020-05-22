@extends('layouts.frontLayout.front_design')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Order Review</li>
                </ol>
            </div><!--/breadcrums-->




            <div class="shopper-informations">

                <div class="row">
                    <div class="col-sm-3">
                        <div class="shopper-info">

                            {{--<p>Shopper Information</p>--}}
                            {{--<form>--}}
                            {{--<input type="text" placeholder="Display Name">--}}
                            {{--<input type="text" placeholder="User Name">--}}
                            {{--<input type="password" placeholder="Password">--}}
                            {{--<input type="password" placeholder="Confirm password">--}}
                            {{--</form>--}}
                            {{--<a class="btn btn-primary" href="">Get Quotes</a>--}}
                            {{--<a class="btn btn-primary" href="">Continue</a>
                        </div>
                    </div>


                    <div class="col-sm-5 clearfix" style="margin-top: 20px;margin-left: -20px;margin-bottom: 50px;">

                        <div class="bill-to">
                            <p>Billing Details</p>
                            <div class="form-one">

                                <div class="form-group">
                                    Email : {{$user_details->email}}
                                </div>
                                <div class="form-group">
                                    First Name : {{$user_details->f_name}}
                                    {{--<input value="{{$user_details->address}}" id="address" name="address" type="text" style="margin-top: 10px;" placeholder="Address">--}}
                                </div>
                                <div class="form-group">
                                   Middle Name : {{$user_details->m_name}}
                                    {{--<input value="{{$user_details->address}}" id="address" name="address" type="text" style="margin-top: 10px;" placeholder="Address">--}}
                                </div>
                                <div class="form-group">
                                    Last Name : {{$user_details->l_name}}
                                    {{--<input value="{{$user_details->address}}" id="address" name="address" type="text" style="margin-top: 10px;" placeholder="Address">--}}
                                </div>

                                <div class="form-group">
                                    Street : {{$user_details->street}}

                                </div>

                                <div class="form-group">
                                    Baranggay : {{$user_details->baranggay}}
                                </div>

                                <div class="form-group">
                                    City : {{$user_details->city}}
                                </div>
                                <div class="form-group">
                                    Phone number : {{$user_details->mobile}}
                                </div>




                            </div>
                        </div>

                    </div>
                    {{--<button id="button" onclick="getElementById('random-string').value=Math.floor(Math.random()*10000)">Create Random Number</button>--}}
                    {{--<br>--}}
                    {{--<input id="random-number" value="" />--}}
                    <div class="col-sm-4">
                        <div class="order-message">
                            {{--<p>Shipping Order</p>--}}
                            {{--<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>--}}
                            {{--<label><input type="checkbox"> Shipping to bill address</label>--}}
                        </div>
                    </div>
                </div>
            </div>


            {{--<div class="step-one">
            {{--<h2 class="heading">Step1</h2>--}}
            {{--</div>--}}
            {{--<div class="checkout-options">--}}
            {{--<h3>New User</h3>--}}
            {{--<p>Checkout options</p>--}}
            {{--<ul class="nav">--}}
            {{--<li>--}}
            {{--<label><input type="checkbox"> Register Account</label>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<label><input type="checkbox"> Guest Checkout</label>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href=""><i class="fa fa-times"></i>Cancel</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div><!--/checkout-options-->--}}

            {{--<div class="register-req">--}}
            {{--<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>--}}
            {{--</div><!--/register-req-->--}}

            {{--//cart--}}
            <div class="review-payment" style="margin-top:20px;">
                <h2>Cart List </h2>
            </div>

                <div class="table-responsive cart_info" style="margin-top: -15px;" >
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
                        <?php $total_amount = 0; ?>
                        @foreach($userCart as $cart)
                            @foreach($cart->reseller_product as $carts)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img style="width:100px;" src="{{asset('images/backend_images/products/small/'.$carts->products()->first()->image)}}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$carts->products()->first()->product_name}}</a></h4>
                                    <p>Code:{{$carts->products()->first()->product_code}} | Size:{{$carts->products()->first()->size}} </p>

                                </td>
                                <td class="cart_price">
                                    <p>P{{$carts->resell_price}}</p>
                                    <input type="hidden" value="{{$carts->price}}">
                                </td>
                                <td class="cart_price">
                                    <p>{{$cart->quantity}}</p>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">P{{$cart->resell_price * $cart->quantity}}</p>
                                    {{--price x quantity to get the total--}}
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url('/cart/delete-product/'.$cart->id)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>

                            <?php $total_amount = $total_amount + ($cart->resell_price * $cart->quantity); ?>
                            <?php ?>
                        @endforeach
                        @endforeach

                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    {{--<tr>--}}
                                    {{--<td>Cart Sub Total</td>--}}
                                    {{--<td>$59</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<td>Exo Tax</td>--}}
                                    {{--<td>$2</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr class="shipping-cost">--}}
                                    {{--<td>Shipping Cost</td>--}}
                                    {{--<td>Free</td>--}}
                                    {{--</tr>--}}
                                    <tr>
                                        <td>Total</td>
                                        <td><span>P<?php echo $total_amount; ?></span></td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            <form id="accountForm" name="accountForm" action="{{url('ty')}}" method="post" >{{csrf_field()}}
                <div class="payment-options">
                    <input type="hidden" name="total" value="{{$total_amount}}">
                    {{--@foreach($cartProducts as $cart)--}}
                    {{--<input  type="text" name="qtyy" value="{{$cart->quantity}}">--}}
                    {{--@endforeach--}}
                    {{--<span>--}}
                    {{--<label><input type="checkbox"> Direct Bank Transfer</label>--}}
                    {{--</span>--}}
                    {{--<span>--}}
                    {{--<label><input type="checkbox"> Check Payment</label>--}}
                    {{--</span>--}}
                    {{--<span>--}}
                    {{--<label><input type="checkbox"> Paypal</label>--}}


                    <button type="submit" class="btn btn-default" style="background-color: orange;color: whitesmoke;">Confirm Order</button>
                </div>
            </form>
        </div>

        </form>
    </section> <!--/#cart_items-->

@endsection