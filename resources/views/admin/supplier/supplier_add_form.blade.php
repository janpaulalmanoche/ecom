@extends('layouts.adminLayout.admin_design')
@section("content")




    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Supplier</a> <a href="#" class="current">Add Supplier</a> </div>
            <h1> Supplier</h1>
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
                            <h5>Add Supplier</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/add-supplier-insert')}}" name="add_category" id="add_category" novalidate="novalidate">{{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Supplier Name</label>
                                    <div class="controls">
                                        <input type="text" name="supname" id="suppname" required>
                                    </div>
                                </div>





                                <div class="form-actions">
                                    <input type="submit" value="Add Supplier" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection