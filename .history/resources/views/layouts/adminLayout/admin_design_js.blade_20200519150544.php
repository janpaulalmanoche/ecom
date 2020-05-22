<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css') }}" />

    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css'/>    <!--add vsweet alerts -->
    {{--<link href=" {{ asset('css/frontend_css/font-awesome.min.css')}}" rel="stylesheet">--}}
    <link href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css') }}" />
    <!--view table css -->
    <link rel="stylesheet" href="{{ asset('css/backend_css/select2.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/backend_css/uniform.css') }}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

@include('layouts.adminLayout.admin_header')

@include('layouts.adminLayout.admin_sidebar')



<div id="container">
</div id="app">
@yield('content')  <!-- in the admin folder, dashboard file-->
</div>
</body>



@include('layouts.adminLayout.admin_footer')


<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/backend_js/select2.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script>   <!-- for jquery or ajax validation file-->
<script src="{{ asset('js/backend_js/matrix.js') }}"></script>
<script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script>
<!-- for our tables in view-->
<script src="{{asset('js/backend_js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/backend_js/matrix.tables.js') }}"></script>
<!-- -->


<script src="{{asset('js/backend_js/main.js') }}"></script>
{{--this should be below in the tables, to avoid errors,for message popup notif--}}
<script src="{{asset('js/backend_js/jquery.gritter.min.js')}}"></script>
{{--<script src="{{asset('js/backend_js/jquery.peity.min.js')}}"></script>--}}
<script src="{{asset('js/backend_js/matrix.interface.js')}}"></script>
<script src="{{asset('js/backend_js/matrix.popover.js')}}"></script>







<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js' ></script> <!-- add this for sweet alert-->

</body>
</html>
