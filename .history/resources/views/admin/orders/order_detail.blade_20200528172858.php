@extends ('layouts.adminLayout.admin_design')
@section('content')


<!--main-container-part-->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Orders</a> </div>
        <h1>Refference No.{{$orders->refference_number}}</h1>
        <!--display error message -->
        @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
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

    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span6">

                <div class="widget-box">
                    <div class="widget-title">
                        <h5>Order Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-striped table-bordered">

                            <tbody>
                                <tr>
                                    <td class="taskDesc">Order ID</td>
                                    <td class="taskStatus">{{$orders->id}}</td>

                                </tr>

                                <tr>
                                    <td class="taskDesc">Order Date</td>
                                    <td class="taskStatus">
                                        {{ date('F d, Y', strtotime($orders->updated_at)) }} |
                                        {{ date('h:i A', strtotime($orders->updated_at)) }}

                                    </td>

                                </tr>

                                <tr>
                                    <td class="taskDesc">Order Status</td>
                                    <td class="taskStatus">{{$orders->order_status}}</td>

                                </tr>

                                <tr>
                                    <td class="taskDesc">Order Total Amount</td>
                                    <td class="taskStatus">PHP {{$orders->total_amount}}</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                {{--clising--}}


                <div class="accordion" id="collapse-group">
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-ok"></i></span>
                                    <h5>Billing Details</h5>
                                </a> </div>
                        </div>
                        <div class="collapse in accordion-body" id="collapseGOne">
                            <div class="widget-content">
                                Name: {{$user_details->f_name}}<br>
                                Phone # :{{$user_details->mobile}}<br>
                                Address<br>
                                Street : {{$user_details->street}}<br>
                                Baranggay : {{$user_details->baranggay}}<br>
                                City : {{$user_details->city}}<br>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="span6">


                <div class="widget-box">
                    <div class="widget-title">
                        <h5>Customer Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-striped table-bordered">

                            <tbody>
                                <tr>
                                    <td class="taskDesc">Customer Name</td>
                                    <td class="taskStatus">{{$user_details->f_name}}
                                        {{$user_details->m_name}} {{$user_details->l_name}} </td>

                                </tr>
                                <tr>
                                    <td class="taskDesc">Customer Email </td>
                                    <td class="taskStatus">{{$user_details->email}}</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="widget-box">
                    <div class="widget-title">
                        <h5>Shipping Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-striped table-bordered">

                            <tbody>
                                <tr>
                                    <td class="taskDesc">Zip Code</td>
                                    <td class="taskStatus">{{$orders->first()->shipping()->first()->zip_code}}</td>

                                </tr>
                                <tr>
                                    <td class="taskDesc">City </td>
                                    <td class="taskStatus">{{$orders->first()->shipping()->first()->city}}</td>
                                </tr>

                                <tr>
                                    <td class="taskDesc">Baranggay </td>
                                    <td class="taskStatus">{{$orders->first()->shipping()->first()->baranggay}}</td>
                                </tr>

                                <tr>
                                    <td class="taskDesc">Street </td>
                                    <td class="taskStatus">{{$orders->first()->shipping()->first()->street}}</td>
                                </tr>

                                <tr>
                                    <td class="taskDesc">Apartment\Floor no. </td>
                                    <td class="taskStatus">{{$orders->first()->shipping()->first()->other_details}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>




            </div>

            <div class="row-fluid">

                <table id="example" class="table table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>



                            {{--<th>Quantity</th>--}}
                            <th>Ordered Products</th>
                            <th> Quantity</th>
                            <th> Reseller</th>
                            <th> Price</th>
                            <th> Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>



                        @foreach($orders4 as $orderss)
                        @foreach($orderss->products as $display)
                        <tr>

                            <td>{{$display->product_name}}</td>

                            <td>


                            </td>
                            <td>

                                @foreach($orderss->ordersz as $pro)

                                {{$pro->pivot->reseller_id}}
                                @endforeach
                            </td>

                            <td> {{$display->pivot->price}}</td>
                            <td>{{($display->pivot->quantity)*($display->pivot->price)}}
                            <td>

                                @endforeach
                                @endforeach
                        <tr>
                            <Td>Total Amout: {{$orders->total_amount}}</Td>
                        </tr>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <hr>

    </div>
</div>
<!--main-container-part-->
@endsection