@extends('layouts.frontLayout.front_design')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div>
        <!--/breadcrums-->


        <div class="shopper-informations">
            <form action="{{'ty'}}" method="post"> @csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Shopper Information</p>
                        <form>

                            <input type="text" name="email" type="text" placeholder="Email" value="{{$user_details->email}}">
                            <input type="text" name="name" type="text" placeholder="First Name" value="{{$user_details->f_name}}">
                            <input type="text" name="m_name" type="text" placeholder="Middle Name" value="{{$user_details->m_name}}">
                            <input type="text" name="l_name" type="text" placeholder="Last Name" value="{{$user_details->l_name}}">

                        </form>
                    </div>
                </div>
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Shipping Details</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Zip Code *" id="zip_code" name="zip_code">
                                <input type="text" placeholder="City *" id="city" name="city">
                                <input type="text" placeholder="Baranggay *" id="baranggay" name="baranggay">
                 
                            </form>
                        </div>
                        <div class="form-two">
                            
                            <input type="text" placeholder="Street *" id="street" style=" background: #F0F0E9;
                                                                                        border: 0 none;
                                                                                        margin-bottom: 10px;
                                                                                        padding: 10px;
                                                                                        width: 100%;
                                                                                        font-weight: 300;">
                                <input type="text" placeholder="phone number *" id="phone_number" name="phone_number" style=" background: #F0F0E9;
                                                                                        border: 0 none;
                                                                                        margin-bottom: 10px;
                                                                                        padding: 10px;
                                                                                        width: 100%;
                                                                                        font-weight: 300;">
                            
                        </div>
                    </div>
                </div>
                    <div class="col-sm-4">
                        <div class="order-message">
                            <p> Apartment,Building,Floor</p>
                            <textarea name="message" placeholder="This field is optional" rows="16" id="optional"></textarea>

                        </div>
                    </div>
            </div>  
                    <input type="submit" value="test">
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="review-payment">
        <h2>Review </h2>
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
                        <p>P{{$cart->resell_price}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}"> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2">

                            @if($cart->quantity>1)
                            <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}"> - </a>
                            @endif
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">PHP {{$cart->resell_price * $cart->quantity}}</p>
                        {{--price x quantity to get the total--}}
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{url('/cart/delete-product/'.$cart->id)}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>


                <?php $total_amount = $total_amount + ($cart->resell_price * $cart->quantity); ?>
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
                                <td><span>PHP<?php echo $total_amount; ?></span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="payment-options">
        {{--<span>--}}
        {{--<label><input type="checkbox"> Direct Bank Transfer</label>--}}
        {{--</span>--}}
        {{--<span>--}}
        {{--<label><input type="checkbox"> Check Payment</label>--}}
        {{--</span>--}}
        {{--<span>--}}
        {{--<label><input type="checkbox"> Paypal</label>--}}
        {{--</span>--}}
    </div>
    </div>
</section>
<!--/#cart_items-->








<script>
    $(document).ready(function() {

        $('.dynamic').change(function() {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('dynamicdependent.fetch3') }}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function(result) {
                        $('#' + dependent).html(result);
                    }

                })
            }
        });

        $('#city').change(function() {
            $('#Baranggay').val('');
            $('#Street').val('');
        });

        $('#Baranggay').change(function() {
            $('#Street').val('');
        });


    });
</script>

@endsection