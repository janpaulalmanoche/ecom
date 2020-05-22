@extends('layouts.adminLayout.admin_design')
@section("content")




<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Products</a> </div>
        <h1>Product</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Add Reseller</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{route('reseller.store')}}">
                            @csrf


                            <div class="control-group">
                                <label class="control-label">First name</label>
                                <div class="controls">
                                    <input type="text" name="first_name">
                                </div>
                            </div>
                          
                            <div class="control-group">
                                <label class="control-label">Middle name</label>
                                <div class="controls">
                                    <input type="text" name="middle_name" id="product_name">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Last name</label>
                                <div class="controls">
                                    <input type="text" name="last_name" id="product_name">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">User name</label>
                                <div class="controls">
                                    <input type="text" name="user_name" id="product_name">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="text" name="password" id="product_name">
                                </div>
                            </div>


                            <div class="form-actions">
                                <input type="submit" value="Add Product" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection