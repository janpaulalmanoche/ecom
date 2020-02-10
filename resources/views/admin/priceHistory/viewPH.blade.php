@extends ('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">
                    Product</a><a href="" class="current">View Price History</a> </div>

            <h1 style="font-family: 'Sakkal Majalla'">
                 Product name: {{$getproname->product_name}}

            </h1>
            <h1 style="font-family: 'Sakkal Majalla';margin-top: -20px;">
                Product code: {{$getproname->product_code}}

            </h1>

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
                                    <th>Price List</th>
                                    <th>Date Change</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($getpricelist as $product)
                                    @foreach($product->pro as $prod)
                                    <!--$categories is our variable name in CategoryController inside our view
                                public function viewCategories(); and we use compact to pass it and our variable name is $categories-->
                                    <tr class="gradeX">
                                        <td>{{$product->price}}</td>
                                        <td>
                                            {{ date('F d, Y', strtotime($product->created_at)) }}
                                        </td>


                                    </tr>
                                @endforeach
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