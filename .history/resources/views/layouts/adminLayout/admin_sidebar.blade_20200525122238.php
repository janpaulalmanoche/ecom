


<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<!--categoties opening -->
        <li class="submenu"> <a href="#"> <span style="margin-left: 29px;">Categories</span></a>
            <ul>
                <li><a href="{{url('/admin/add-category')}}">Add Main Category</a></li>
                <li><a href="{{url('/admin/view-main-category')}}">Add Sub Category</a></li>

                <li><a href="{{url('/admin/view-categories')}}">View Category</a></li>
            </ul>
        </li>
        <!-- clossing-->


        <li class="submenu"> <a href="#"> <span style="margin-left: 29px;">Reseller</span></a>
            <ul>
                <li><a href="{{route('reseller.create')}}">Add Reseller</a></li>
                <li><a href="{{route('reseller.index')}}">View Resellers</a></li>
            </ul>
        </li>

        <!--products opening -->
        <li class="submenu"> <a href="#"> <span style="margin-left: 29px;">Products</span> </a>
            <ul>
                <li><a href="{{url('/admin/add-product')}}">Add Product</a></li>
                <li><a href="{{url('/admin/view-products')}}">View Products</a></li>
                <li><a href="{{url('/admin/view-pricehistory')}}">Price History</a></li>

            </ul>
        </li>
        <!-- clossing-->

        <!--products opening -->
        <li class="submenu"> <a href="#"><span style="margin-left: 29px;">Supplier</span> </a>
            <ul>
                <li><a href="{{url('/admin/add-supplier-form')}}">Add Supplier</a></li>
                <li><a href="{{url('/admin/view-supplier')}}">View Supplier</a></li>

            </ul>
        </li>
        <!-- clossing-->







        <li class="submenu"> <a href="#"> <span style="margin-left: 29px;">Stock</span> </a>
            <ul>

                <li><a href="{{url('/admin/view-product-stocks')}}">Add Stocks</a></li>
                <li><a href="{{url('/admin/view-request-addstocks')}}">View Delivered Stock Records</a></li>
                <li><a href="{{url('/admin/view-pending-addstocks')}}">View Pending Stock Records</a></li>
            </ul>
        </li>
        <!-- clossing-->

        <!-- <li class="submenu"> <a href="#"> <span style="margin-left: 29px;">Measurements</span> </a>
            <ul>
                <li><a href="{{url('/admin/add-measurement')}}">Add Measurements</a></li>
                <li><a href="#">View Measurements</a></li>

            </ul>
        </li> -->


        <li class="submenu"> <a href="#"> <span style="margin-left: 29px;"> Orders  </span> </a>
            <ul>
                <!-- <li><a href="{{url('/admin/view-orders')}}">New Orders <span class="label label-important"> static 1</span></a></li>
                <li><a href="{{url('/admin/view-in-process-order')}}">In Process Orders</a></li>
                <li><a href="{{url('/admin/view-cancelled-order')}}">Cancelled Orders</a></li> -->
                <li><a href="{{url('/admin/view-paid-orders')}}">Paid Orders</a></li>

            </ul>
        </li>

        <li class="submenu"> <a href="#"> <span style="margin-left: 29px;">Report  </span> </a>
            <ul>
                <li><a href="{{url('/admin/daily-report-form')}}">Daily Report</a></li>

                <li><a href="{{url('/admin/view-p')}}">Purchase History</a></li>
                <li><a href="{{url('/admin/date-range')}}">Date Range Report</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"> <span style="margin-left: 29px;">Reseller Report  </span> </a>
            <ul>
                <li><a href="{{url('/admin-reseller/report')}}">Monthy Profit Report</a></li>

                <!-- <li><a href="{{url('/admin/view-p')}}">Purchase History</a></li>
                <li><a href="{{url('/admin/date-range')}}">Date Range Report</a></li> -->
            </ul>
        </li>



    </ul>

</div>

<!--sidebar-menu-->