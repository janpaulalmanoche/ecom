<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">


                    <h2>Daily Report</h2>


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
                        Daily Report Date : {{date('F d, Y', strtotime($hi))}}
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
                    <h3 class="panel-title"><strong>Product Sales</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>

                                <td><strong>Refference #</strong></td>
                                <td><strong>Product</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>
                                <td class="text-center"><strong>Sub Total</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <?php $total_amount = 0; ?>
                  


                                    <tr>

                                        <td class="text-center"> </td>
                                        <td class="text-center"> </td>

                                        <td class="text-center"> </td>

                                        <td class="text-center"> </td>
                                        <td class="text-center"> </td>

                                    </tr>


                            <tr>
                                    <?php $total_amount = $total_amount + ($oo->price*$oo->quantity); ?>
                            

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