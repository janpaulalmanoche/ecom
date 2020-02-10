
@extends('layouts.frontLayout.front_design')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Paid Orders</li>
                </ol>
                <a href="{{url('/orders-history')}}"><span style="color: orange; font-size: 17px;" ><p style="margin-top: -60px;">View New Orders</p></span></a>
            </div><!--/breadcrums-->


    <section id="do_action" style="margin-bottom: 250px;" >

    <div class="container">

        <div class="heading" align="center">

            <table id="example" class="table table-striped table-bordered" style="width:100%;">

                <thead>
                <tr>
                    <th>Refference No.</th>


                    {{--<th>Quantity</th>--}}
                    <th>Ordered Products</th>
                    <th> Price</th>

                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Payment Date</th>
                    <th>Order Status</th>

                </tr>
                </thead>
                <tbody>
                @if($countORD > 0)
                    <?php $total = 0;?>
                    @foreach($orders as $order)

                        <tr>
                            <td>{{$order->refference_number}}</td>


                            <td>
                                {{--@foreach($userCart as $cart)--}}
                                {{--{{$cart->product_name}}<br>--}}
                                {{--@endforeach--}}
                                @foreach($order->products as $pro){{-- orders is the relation name ,youi need relations to make things easier--}}
                                {{$pro->product_name}}

                               {{--in our controller we only call for the orders table,but we stte our relation name, so to call to
                                                    the other table with relatins,just do the $order->ordersz as $pro to switch to the other table--}}
                                <br>
                                @endforeach
                            </td>
                            <td>
                                {{--@foreach($userCart as $cart)--}}
                                {{--{{$cart->product_name}}<br>--}}
                                {{--@endforeach--}}
                                @foreach($order->ordersz as $pro){{-- orders is the relation name ,youi need relations to make things easier--}}
                               {{--in our controller we only call for the orders table,but we stte our relation name, so to call to
                                                    the other table with relatins,just do the $order->ordersz as $pro to switch to the other table--}}
                                {{$pro->price}} - (quantity-{{$pro->quantity}})</br>
                                @endforeach
                            </td>


                            <td> {{$order->total_amount}}</td>
                            <td>
                                {{--{{$order->created_at}}--}}
                                {{ date('F d, Y', strtotime($order->created_at)) }}
                            </td>
                            <td>

                                {{ date('F d, Y', strtotime($order->updated_at)) }} |
                                |
                                {{ date('h:i A', strtotime($order->updated_at)) }}<br />
                                {{--{{$order->updated_at}}</td>--}}
                            <td>{{$order->order_status}} </td>
                            <?php $total = $total + ($pro->price * $pro->quantity)?>
                            @endforeach

                            @else

                                <h4> NO ORDERS</h4>
                            @endif

                            <span> <?php echo $total;?></span>
                        </tr>
                </tbody>
            </table>

        </div>
    </div>
</section>


@endsection