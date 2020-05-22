@extends ('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">
                    Products</a><a href="" class="current">View Products</a>> </div>
            <h1>Products</h1>

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
                            <h5>View Products</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <!--column names -->
                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Date Registered</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <!--$categories is our variable name in CategoryController inside our view
                                public function viewCategories(); and we use compact to pass it and our variable name is $categories-->
                                    <tr class="gradeX">
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->category_id}}</td>

                                        <td>{{$product->category_namee}}</td><!--//category_namee is in our conroller-->

                                        <td>{{$product->product_code}}</td>
                                        <td>{{$product->brand}}</td>
                                        {{--<td>{{$product->description}}</td>--}}
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->size}}{{$product->measurement}}</td>
                                        <td>{{$product->stock}}</td>

                                            @if(!empty($product->image))
                                             <td>
                                                <img src="{{asset('/images/backend_images/products/small/'.$product->image)
                                                }}" style="width:60px;">
                                                 @endif
                                             </td>

                                        <td class="center">
                                            {{--<a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini">View</a>--}}
                                            {{--<a href="{{ url('/admin/add-attributes/'.$product->id ) }}" class="btn btn-success btn-mini">Attributes</a>--}}

                                            <a href="{{url('/admin/edit-product/'.$product->id) }}" class="btn btn-primary btn-mini"><i class="icon-edit"></i> </a>
                                            <!-- we inclue $product->id to pass id for the edit_product page -->




                                        <!-- <a id="#delProductT" href="<?php/* {{url('/admin/delete-product/'.$product->id)}}*/?> " class="btn btn-danger btn-mini">Delete</a>-->
                                            <a id="delProduct" rel="{{ $product->id }}" rel1="delete-product" href="javascript:"
                                                class="btn btn-danger btn-mini deleteRecord"><i class="icon-trash"></i> </a>
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