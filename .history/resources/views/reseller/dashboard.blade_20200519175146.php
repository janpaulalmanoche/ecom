@extends('layouts.resellerLayout.reseller_design')
@section('content')

<!--main-container-part-->
<div>
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="quick-actions_homepage">
            <ul class="quick-actions">
                <reseller-profit> </reseller-profit>
                <!--             
                <li class="bg_ls"> <a href="buttons.html"> <i class="icon-shopping"></i> Buttons</a> </li>
                <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
                <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
                <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li> -->
            </ul>
        </div>
        <!--End-Action boxes-->

        <!--Chart-box-->
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                    <h5>Site Analytics</h5>



                </div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <div class="span9">

                        </div>
                        <div class="span3">
                    
                        <ul class="site-stats">
                            <!-- <li class="bg_lh"><a href="#"><i class="icon-user"></i> <strong> </strong> <small>Total Users</small></a></li> -->
                            <!-- <li class="bg_lh"><a href="#"><i class="icon-plus"></i> <strong>120</strong> <small>New Users </small></a></li> -->
                            <!-- <li class="bg_lh"><a href="#"><i class="icon-shopping-cart"></i> <strong> </strong> <small>New Orders</small></a></li> -->
                            <!-- <li class="bg_lh"><a href="#"><i class="icon-tag"></i> <strong> </strong> <small>Total Orders</small></a></li> -->
                            <!-- <li class="bg_lh"><a href="#"><i class="icon-repeat"></i> <strong>10</strong> <small>Pending Orders</small></a></li> -->
                           
                        </ul>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End-Chart-box-->
        <hr />
        <div class="row-fluid">
            <div class="span6">

               <reseller-dashboard user="{{auth()->user()->id}}"></reseller-dashboard>


            </div>
            <!-- <div class="span6">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class=""></i></span>
                        <h5>Products with empty stocks</h5>
                    </div>
                    <div class="widget-content nopadding fix_hgt" style="height: 500px;">
                        <ul class="recent-posts">

                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="\" style="height: 45px;width: 80px;"> </div>
                                <div class="article-post"> <span class="user-info"> product name</span>
                                    <p>Stocks Remaining </p>
                                    <a href=" "> <button style="margin-top: 4px;" class="btn-primary">Add</button></a>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>

            </div> -->
        </div>
    </div>
</div>

<!--end-main-container-part-->

@endsection