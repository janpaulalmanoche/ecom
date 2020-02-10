@extends ('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">
                    Categories</a><a href="" class="current">View Categories</a>> </div>
            <h1>Categories</h1>

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
                <div class="span12">

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Categories</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <!--column names -->
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Category Level</th>
                                    <th>Category URL</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <!--$categories is our variable name in CategoryController inside our view
                                public function viewCategories(); and we use compact to pass it and our variable name is $categories-->
                                <tr class="gradeX">
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->parent_id}}</td>
                                    <td>{{$category->url}}</td>
                                    <td>{{$category->status}}</td>
                                    <td class="center">

                                        <a href="{{url('/admin/edit-category/'.$category->id) }}" class="btn btn-primary btn-mini"><i class="icon-edit"></i></a>
                                        <!-- we inclue $category->id to pass id for the edit_category page -->

                                    <!-- <a id="#DEL_CAT" href="<?php/* {{url('/admin/delete-category/'.$category->id)}}*/?> " class="btn btn-danger btn-mini">Delete</a>-->
                                <a id="DEL_CAT" rel="{{ $category->id }}" rel1="delete-category" href="javascript:"  class="btn btn-danger btn-mini deleteRecord"><i class="icon-trash"></i></a>
                                        <!-- rel1 is our url -->


                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection