@extends('layouts.adminLayout.admin_design')
@section("content")




    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Report</a> <a href="#" class="current">Date Range Report</a> </div>
            <h1>Date Range Report</h1>

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
                            <h5>Date Range Report</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form  class="form-horizontal" enctype = "multipart/form-data" method="post" action="{{url('/admin/generate-randomR')}}" name="me" id="me">{{ csrf_field() }}



                                <div class="control-group" style="height: 200px;">
                                    <label class="control-label">Choose Date From:</label>
                                    <div class="controls">
                                        <input type="date" name="from" id="mcode" required>

                                        </br>

                                    </div>
                                </div>


                                <div class="control-group" style="height: 200px;margin-top:-150px;">
                                    <label class="control-label">Choose Date To:</label>
                                    <div class="controls">
                                        <input type="date" name="to" id="mcode" required>

                                        </br>
                                        </br>
                                        <input type="submit" value="Generate Report" class="btn btn-success">
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection