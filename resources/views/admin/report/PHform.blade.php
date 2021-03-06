<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">


                <h2>Purchase History</h2>


                Date Print : {{date('F d, Y', strtotime($mytime))}}
            </div>
            <hr>

            <div class="row">
                <div class="col-xs-6">
                    <address>


                    </address>

                </div>
                <div class="col-xs-6 text-right">
                    <address>

                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">

                    <address>

                    </address>

                    <address>
                        {{--Daily Report Date : {{date('F d, Y', strtotime($hi))}}--}}
                    </address>
                    <address>
                </div>
                <div class="col-xs-6 text-right">



                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Purchase History</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">

                        <h3>  Product:{{$getproductNAME->product_name}} </h3>
                        <table class="table table-condensed">
                            <thead>
                            <tr>

                                <td class="text-center"><strong>Customer</strong></td>
                                <td class="text-center"><strong>Refference#</strong></td>
                                <td class="text-center"><strong>Date</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>
                                <td class="text-center"><strong>Sub Total</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <?php $total_amount = 0; ?>
                            @foreach($getproducts as $oo)
                                @foreach($oo->usersx as $kk)
                                @foreach($oo->product as $ll )


                                    <tr>

                                        <td class="text-center">{{$kk->email}}</td>
                                        <td class="text-center">{{$kk->pivot->refference_number}}</td>
                                        <td class="text-center">
                                            {{date('F d, Y', strtotime($oo->created_at)) }}</td>

                                        <td class="text-center">{{$oo->price}}</td>

                                        <td class="text-center">{{$oo->quantity}}</td>
                                        <td class="text-center">{{($oo->price*$oo->quantity)}}</td>

                                    </tr>


                                    <tr>
                                    <?php $total_amount = $total_amount + ($oo->price*$oo->quantity); ?>
                                @endforeach

                            @endforeach
                            @endforeach

                            <tr>

                                <td class="no-line"></td>
                                <td class="no-line text-right"><strong>
                                        TOTAL
                                        <span>PHP <?php echo $total_amount; ?></span>
                                    </strong></td>
                                {{--<td class="no-line text-center">{{$order->total_amount}}</td>--}}

                            </tr>

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>