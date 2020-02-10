@extends ('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">
                    Stocks</a><a href="" class="current">View Delivered Stocks</a> </div>
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
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Delivered Stock</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <!--column names -->
                                    <th>ID</th>
                                    <th>Product name</th>
                                    <th>Supplier</th>
                                    <th>Stock Requested</th>
                                    <th>Stock Delivered</th>
                                    <th>Date Delivered</th>
                                    <th>Status</th>


                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>





                                @foreach($getdetails as $detail )
                                    <!--$categories is our variable name in CategoryController inside our view
                                public function viewCategories(); and we use compact to pass it and our variable name is $categories-->
                                    <tr class="gradeX">
                                        <td>{{$detail->id}}</td>
                                        @foreach($detail->productsR as $p)

                                            <td> {{$p->product_name}}</td>
                                                @endforeach
                                        @foreach($detail->supplierR as $s)

                                            <td>{{$s->supplier_name}}</td>

                                        @endforeach


                                        <td>

                                                {{ $detail->stocks_requested }}


                                        </td>




                                        <td> {{ $detail->stocks_delivered }} </td>
                                        {{--<td>{{$product->description}}</td>--}}


                                        <td>{{ date('F d, Y', strtotime($detail->date_delivered)) }}</td>


                                        <td>{{$detail->status}}</td>

                                        {{--@if(!empty($product->image))--}}
                                        {{--<td>--}}
                                        {{--<img src="{{asset('/images/backend_images/products/small/'.$product->image)--}}
                                        {{--}}" style="width:60px;">--}}
                                        {{--@endif--}}


                                        {{--</td>--}}
                                        {{--<td>--}}
                                        {{--@foreach($order->ordersz as $pro)--}}
                                        {{--{{$pro->quantity}}<br>--}}

                                        {{--@endforeach--}}
                                        {{--</td>--}}




                                        <td class="center">
                              <a href="{{url('/admin/view-order/'.$detail->id )}}"  class="btn btn-success btn-mini">View</a>
                             @if($detail->status == 'Pending')
                   <a href="{{url('/admin/view-order/'.$detail->id )}}"  class="btn btn-success btn-mini">Update</a>
                                 @endif
                              {{--<p><b>Availability:</b> <span id="Availability">@if($total_stock>0)In Stock @else Out of stock @endif</span></p>--}}
                            {{--<p><b>Condition:</b>@if($total_stock>0) New @else  @endif</p>--}}


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