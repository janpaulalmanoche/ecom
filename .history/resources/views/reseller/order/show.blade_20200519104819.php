@extends ('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">
                    Orders</a><a href="" class="current">View Orders</a>> </div>
            <h1>New Orders</h1>

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
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Customer name</th>
                                    <th>Customer email</th>
                                    <th>Order Products</th>
                                    <th>Order Amount</th>
                              

                                    <th>Order Status</th>
                                   

                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>





                               
                                    <!--$categories is our variable name in CategoryController inside our view
                                public function viewCategories(); and we use compact to pass it and our variable name is $categories-->
                                    <tr class="gradeX">
                                        <td> </td>
                                        <td>
                                         
                                            
                                            </td>

                           
                                        <td>

                                        </td>
                                           

                                        <td>

                                        </td>

                                      
                                        <td>
                                           
                                        </td>


                                        <td>amount</td>
                                     


                                        <td>
                                        order status
                                        </td>



                                            <td class="center">
                                                <a href="{{url('/admin/view-order/'.$order->id )}}"  class="btn btn-success btn-mini">View</a>

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