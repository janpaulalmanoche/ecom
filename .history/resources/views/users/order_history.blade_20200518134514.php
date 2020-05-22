
@extends('layouts.frontLayout.front_design')
@section('content')


    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">New Orders</li>
                </ol>
                <a href="{{url('/orders-history-paid')}}"><span style="color: orange; font-size: 17px;" ><p style="margin-top: -60px;">View Paid Orders</p></span></a>
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
                                <th> Reseller</th>
                                <th> Quantity</th>
                                <th>Total</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Expiry Date</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($countORD2 > 0)
                            @foreach($orders2 as $order)

                            <tr>
                                <td>{{$order->refference_number}}</td>


                                <td>
                              
                                    @foreach($order->products as $pro)
                                        {{$pro->product_name}}
                                    
                                        <br>

                                        @endforeach
                                </td>
                                <td>
                                  
                                  @foreach($order->reseller as $pro)
                                    {{$pro->reseller_id}}
                                    <br>

                                  @endforeach
                              </td>
                                <td>
                                  
                                    @foreach($order->ordersz as $pro){{-- orders is the relation name ,youi need relations to make things easier--}}
                                    {{$pro->quantity}}<br>{{--in our controller we only call for the orders table,but we stte our relation name, so to call to
                                                    the other table with relatins,just do the $order->ordersz as $pro to switch to the other table--}}

                                    @endforeach
                                </td>

                               
                                <td> {{$order->total_amount}}</td>
                                <td>
                                    {{ date('F d, Y', strtotime($order->created_at)) }} |
                                    {{ date('h:i A', strtotime($order->updated_at)) }}<br />
                                    {{--dispaly time in better format--}}
                                </td>
                                <td>{{$order->order_status}} </td>


                                <td>
                                   {{ date('F d, Y', strtotime($order->created_at->addDays(1) )) }} |
                                    {{ date('h:i A', strtotime($order->updated_at)) }}


                                </td>

                                @endforeach
                                @else

                                    <h4> NO ORDERS</h4>
                                @endif


                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </section>




@endsection
