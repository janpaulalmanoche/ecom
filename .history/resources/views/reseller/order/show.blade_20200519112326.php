@extends ('layouts.resellerLayout.reseller_design_no_js')
@section('content')

  <!--main-container-part-->
  <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Orders</a> </div>
            <h1>Refference No.  {{$new_order->refference_number}}</h1>
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
                                    <td class="taskDesc">Order Date</td>
                                    <td class="taskStatus">
                                      
                                        {{date('F d Y h:i a',strtotime($new_order->created_at))}}
                                    </td>

                                </tr>

                                <tr>
                                    <td class="taskDesc">Order Status</td>
                                    <td class="taskStatus"> {{$new_order->order_status}}</td>

                                </tr>

                                <!-- <tr>
                                    <td class="taskDesc">Order Total Amount</td>
                                    <td class="taskStatus">PHP {{$new_order->total_amount}} </td>

                                </tr> -->

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
                                     Name: {{$new_order->customer()->first()->f_name}}
                                     {{$new_order->customer()->first()->m_name}}
                                     {{$new_order->customer()->first()->l_name}}
                                     <br>
                                    Phone # :{{$new_order->mobile}} <br>
                                        Address<br>
                                    Street : {{$new_order->customer()->first()->street}}<br>
                                    Baranggay : {{$new_order->customer()->first()->baranggay}}<br>
                                    City : {{$new_order->customer()->first()->city}}  <br>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="span6">

<!-- 
                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Customer Details</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-striped table-bordered">

                                <tbody>
                                <tr>
                                    <td class="taskDesc">Customer Name</td>
                                    <td class="taskStatus">  </td>

                                </tr>
                                <tr>
                                    <td class="taskDesc">Customer Email </td>
                                    <td class="taskStatus"> </td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div> -->
              
                    <!-- <div class="widget-box">
                        <div class="widget-title">
                            <h5>Update Order Status</h5>
                        </div>
                        <form action="{{url('/admin/update-status')}}" method="post">{{csrf_field()}}
              
                            <input type="hidden" name="order_id" value="">
                            <table width="100%">
                                <tr>
                                    <td>
                         
                                    </td>
                                    <td>
                            <input type="submit" value="Update">
                                    </td>
                            </table>
                        </form>
                        <div class="widget-content nopadding">

                        </div>
                    </div> -->
                




                </div>

                <div class="row-fluid">

                    <table id="example" class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                        <tr>



                    
                            <th>Ordered Product</th>
                            <th> Quantity</th>
                            <th> Price</th>
                            <th> Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        @foreach($new_order->ordersz as $order_products)
                   
                            <tr>
                                <td> {{$order_products->product()->first()->product_name}} </td>
                                

                                <td>  {{$order_products->quantity}}</td>
                                   
                                <td> {{$order_products->price}}</td>
                                <td> {{($order_products->price) * ($order_products->quantity)}}<td>
                        
                          
                                <tr>
                                <Td> <span style="background-color: red;color:white;padding:2px 5px">Total Amout :  {{$total}} </span> </Td>
                                </tr>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <hr>

        </div>
    </div>
@endsection