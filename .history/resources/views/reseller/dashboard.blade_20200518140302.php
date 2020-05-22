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
            
                <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
                <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
                <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
                <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li>

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
        <hr />
        <div class="row-fluid">
            <div class="span6">

                <div class="widget-box">

                </div>


            </div>
            <div class="span6">

                <div class="widget-box">

                </div>

            </div>
        </div>
    </div>
</div>

<!--end-main-container-part-->

@endsection