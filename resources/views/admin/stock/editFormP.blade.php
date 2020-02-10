@extends('layouts.adminLayout.admin_design')
@section("content")




    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Add Stcok</a> <a href="#" class="current">Pending Stock</a> </div>
            <h1>Stock</h1>

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
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Pending Delivered Stock</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form  class="form-horizontal" enctype = "multipart/form-data" method="post" action="{{url('/admin/update-Pstcokk/'.$getdetails->id)}}" name="me" id="me">{{ csrf_field() }}
                            <!-- enctype for intervention image-->
                                {{--<input type="hidden" value ="{{$getdetails->pr->id}}" name="id" id="mname">--}}
                                <div class="control-group">
                                    <label class="control-label">Product name : </label>
                                    <div class="controls" style="font-size: 22px; margin-top:5px;" >
                                        {{$getdetails->productsS->product_name}}
                                    </div>
                                </div>

                                <div class="control-group" style="font-size: 22px; margin-top:5px;" >
                                    <label class="control-label">Product Code : </label>
                                    <div class="controls">
                                        {{$getdetails->productsS->product_code}}
                                    </div>




                                    <div class="control-group" >
                                        <label class="control-label">Supplier</label>
                                        <div class="controls" style="width:250px;font-size: 15px;">
                                            {{$getdetails->supplierRS->supplier_name}}

                                        </div>
                                    </div>


                                    <div class="control-group" >
                                        <label class="control-label">Stock Requested</label>
                                        <div class="controls">
                                            {{$getdetails->stocks_requested}}
                                        </div>
                                    </div>




                                    <div class="control-group" >
                                        <label class="control-label">Stock Delivered</label>
                                        <div class="controls">
                                            {{$getdetails->stocks_delivered}}
                                        </div>
                                    </div>


                                    <div class="control-group" >
                                        <label class="control-label">Pending Stocks</label>
                                        <div class="controls">
                                            <input type="text" name="PS" id="mcode" required>
                                        </div>
                                    </div>


                                    {{--<div class="control-group" >--}}
                                        {{--<label class="control-label">Date Delivered</label>--}}
                                        {{--<div class="controls">--}}
                                            {{--<input type="date" name="dateDelivered" id="mcode">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}






                                    <div class="form-actions">
                                        <input type="submit" value="Update Stock" class="btn btn-success">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection