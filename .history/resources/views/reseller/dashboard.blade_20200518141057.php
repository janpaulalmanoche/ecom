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

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End-Chart-box-->
        <hr/>
        <div class="row-fluid">
            <div class="span6">

                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class=""></i></span>
                        <h5>New Orders count</h5>
                    </div>
                    <div class="widget-content nopadding fix_hgt" style="height: 500px;">
                        <ul class="recent-posts">
              
                            <li>
                                <div class="user-thumb"> <i class="icon-user"></i></div>
                                <div class="article-post"> <span class="user-info">date </span> <br> email
                                    <p><a href="#">New Order ( Reference Number # ).  View for more Details</a> </p>
                                </div>
                                <a href=""> <button  class="btn-primary">View</button></a>
                            </li>
                           

                                {{--<button class="btn btn-warning btn-mini">View All</button>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>


           </div>
            <div class="span6">

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

            </div>
        </div>
    </div>
</div>

<!--end-main-container-part-->

@endsection