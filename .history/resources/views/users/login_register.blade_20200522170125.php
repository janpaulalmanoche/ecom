@extends('layouts.frontLayout.front_design')
@section('content')

    <section id="form" style="margin-top:30px;"><!--form-->
        <div class="container">
            <div class="row">
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block"  style="background-color:#f2dfd0">
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
                <div class="col-sm-4 col-sm-offset-1" style="margin-left: 380px;" >
                    <div class="login-form">
                        <!--login form-->
                        <h2>Login to your account</h2>
                        <form id="loginForm" name="loginForm" method="post" action="{{url ('login') }}>{{csrf_field()}}
                            <input type="email" name="email" id="email" placeholder="Email Address" />
                            <input type="password" name="password" id="password" placeholder="Password" />
                            {{--<span>--}}
								{{--<input type="checkbox" class="checkbox">--}}
								{{--Keep me signed in--}}
							{{--</span>--}}
                            <button type="submit" class="btn btn-default">Login</button>

                        </form></br>
                        <a href="{{url('/user-registration')}}"> <p><span style="font-weight: bold; color: orange;">Create Account here</span></p></a>
                    </div><!--/login form-->
                </div>

                    {{--//--}}
                {{--<div class="col-sm-1">--}}
                    {{--<h2 class="or">OR</h2>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4">--}}
                    {{--<div class="signup-form"><!--sign up form-->--}}
                        {{--<h2>New User Signup!</h2>--}}
                        {{--<form id="registerform" name="registerform" action="{{url('/user-register')}}" method="post" >{{csrf_field()}}--}}
                            {{--<input id="name" name="f_name" type="text" placeholder="First Name">--}}
                            {{--<input id="name" name="m_name" type="text" placeholder="Middle Name">--}}
                            {{--<input id="name" name="l_name" type="text" placeholder="Last Name">--}}
                            {{--<input id="email" name="email" type="email" placeholder="Email Address">--}}
                            {{--<input id="password" name="password" type="password" placeholder="Password">--}}
                            {{--<button type="submit" class="btn btn-default">Signup</button>--}}
                        {{--</form>--}}
                    {{--</div><!--/sign up form-->--}}
                {{--</div>--}}

            </div>
        </div>
    </section><!--/form-->



@endsection