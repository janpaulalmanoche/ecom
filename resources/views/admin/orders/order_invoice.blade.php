<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">

                @foreach($orders as $order)
                <h2>Invoice</h2>
                 <span style="margin-left: -260px;"> Date Print : {{date('F d, Y', strtotime($mytime))}}</span>

                    <h3 class="pull-left">Refference No. {{$order->refference_number}}</h3>


            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>

                        <strong>Billed To:</strong><br>
                        Name : {{$matchid->f_name}} {{$matchid->m_name}} {{$matchid->l_name}}<br>
                        Street: {{$matchid->street}}<br>
                            Baranggay: {{$matchid->baranggay}}<br>
                        City: {{$matchid->city}}<br>

                    </address>

                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        {{--<strong>Shipped To:</strong><br>--}}
                        {{--Jane Smith<br>--}}
                        {{--1234 Main<br>--}}
                        {{--Apt. 4B<br>--}}
                        {{--Springfield, ST 54321--}}
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">

                    <address>

                    </address>

                    <address>
                        <strong>Order Date:</strong><br>
                        {{--{{$order->created_at}}--}}
                        {{ date('F d, Y', strtotime($order->created_at)) }} <br><br>
                    </address>
                    <address>
                </div>
                <div class="col-xs-6 text-right">

                        <strong>Payment Date:</strong><br>
                        {{--{{$order->created_at}}--}}
                     {{ date('F d, Y', strtotime($order->updated_at)) }} |
                    {{--dispaly date in better format--}}

                    {{ date('h:i A', strtotime($order->updated_at)) }}<br />
                    {{--dispaly time in better format--}}




                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td><strong>Item</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>

                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                @foreach($orders as $oo)
                                    @foreach($oo->products as $ll)

                            <tr>

                                <td class="text-center">{{$ll->product_name}}</td>

                                <td class="text-center">{{$ll->pivot->price}}</td>

                                <td class="text-center">{{$ll->pivot->quantity}}</td>

                            </tr>

                            @endforeach
                            @endforeach

                            <tr>

                            <tr>

                                <td class="no-line"></td>
                                <td class="no-line text-right"><strong>Total</strong></td>
                                <td class="no-line text-center">{{$order->total_amount}}</td>
                            </tr>
                            </tbody>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>