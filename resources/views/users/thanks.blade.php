
    @extends('layouts.frontLayout.front_design')
@section('content')


    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Thanks</li>
                </ol>
            </div><!--/breadcrums-->

        <section id="do_action" style="text-align: center;margin-bottom: 250px;" >
            <div class="container">
                <div class="heading">
                    <h3>YOUR ORDER HAS BEEN PLACED</h3>
                    <P>Your order reference number is {{Session::get('order_id')}} and total payable is PHP {{Session::get('total_amount')}}  </P>
                </div>
            </div>
        </section>

    </section> <!--/#cart_items-->

@endsection
    <?php
    Session::forget('total_amount');
    Session::forget('order_id');
    ?>