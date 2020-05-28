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

                <div class="col-sm-4" style="margin-left: 380px;">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form id="registerform" name="registerform" action="{{url('/user-register')}}" method="post" >{{csrf_field()}}
                            First name<input id="name" name="f_name" type="text" placeholder="First Name">
                            Middle name<input id="name" name="m_name" type="text" placeholder="Middle Name">
                            Last name<input id="name" name="l_name" type="text" placeholder="Last Name">
                            Email<input id="email" name="email" type="email" placeholder="Email Address">
                            Password<input id="password" name="password" type="password" placeholder="Password">
                            <button type="submit" class="btn btn-default">Signup</button>

                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>

    </section><!--/form-->



@endsection