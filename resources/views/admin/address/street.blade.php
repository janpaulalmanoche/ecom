@extends('layouts.adminLayout.admin_design')
@section("content")




    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Street</a> <a href="#" class="current">Add Street</a> </div>
            <h1>Street</h1>

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
                            <h5>Add Street</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form  class="form-horizontal" enctype = "multipart/form-data" method="post" action="{{url('/admin/add-street2')}}" name="add_product" id="me" novalidate="novalidate">{{ csrf_field() }}
                            <!-- enctype for intervention image-->

                                <div class="control-group">
                                    <label class="control-label">City</label>
                                    <div class="controls">
                                        <select name="bgid" style="width:220px;">
                                            <option value="0">Choose Baranggay</option>
                                            @foreach($levels as $val)
                                                <option value="{{$val->id}}"> {{$val->baranggay}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Street Name</label>
                                    <div class="controls">
                                        <input type="text" name="streett" id="mcode">
                                    </div>
                                </div>




                                <div class="form-actions">
                                    <input type="submit" value="Add Street" class="btn btn-success" style="margin-left: 97px;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection