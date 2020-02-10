@extends('layouts.frontLayout.front_design')
@section('content')

    <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form" >

                        <h2>update account</h2>

                        <form id="accountForm" name="accountForm" action="{{url('/account')}}" method="post" >{{csrf_field()}}

                            <span style="font-family:Arial">Email</span>
                            <input style="width: 250px;" id="name" name="email" type="text" placeholder="Email" value="{{$user_details->email}}">

                            <span style="font-family:Arial">First Name</span>
                            <input style="width: 250px;" id="name" name="name" type="text" placeholder="First Name" value="{{$user_details->f_name}}">

                            <p><span style="font-family:Arial">Middle Name</span></p>
                            <input style="width: 250px;" id="name" name="m_name" type="text" placeholder="Middle Name" value="{{$user_details->m_name}}">

                            <p> <span style="font-family:Arial">Last Name</span></p>
                            <input style="width: 250px;" id="name" name="l_name" type="text" placeholder="Last Name" value="{{$user_details->l_name}}">

                            <p><span style="font-family:Arial">City</span></p>
                            <div class="controls">
                                <select class="form-control input-lg dynamic" data-dependent="Baranggay" id="city" name="city" style="width:250px;height: 40px;background-color: whitesmoke;font-size: 15px;">
                                    <option value="select">Select City</option>
                                    @foreach($list as $li)

                                        {{--<option value="{{$li->City}}">{{$li->City}}</option>--}}

                                        <option value="{{$li->City}}" @if($li->City == $user_details->city) selected="" @endif>
                                            {{$li->City}}
                                        </option>
                                        @endforeach

                                    {{--<option value="New" @if($orders->order_status == "New") selected="" @endif>New</option>--}}

                                </select>

                            </div>


                            <p> <span style="font-family:Arial">Baranggay</span></p>
                            <div class="controls">
                                <select class="form-control input-lg dynamic" id="Baranggay" name="baranggay" data-dependent="Street" style="width:250px;height: 40px;background-color: whitesmoke;font-size: 15px;">
                                    <option value="select">Select Baranggay</option>

                                </select>

                            </div>


                            <p>  <span style="font-family:Arial">Street</span> </p>
                            <div class="controls">
                            <select class="form-control input-lg dynamic" id="Street" name="street" style="width:250px;height: 40px;background-color: whitesmoke;font-size: 15px;">
                                <option value="select">Select Street</option>
                            </select>
                            </div>



                            <span style="font-family:Arial">Mobile #</span>
                            <input style="width: 250px;" id="mobile" name="mobile" type="text" placeholder="Mobile +63" value="{{$user_details->mobile}}">


                            <button type="submit" class="btn btn-default">Update</button>

                        </form>

                    </div>
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <h2>Update Password!</h2>
                        <form id="passwordForm" name="passwordForm" action="{{url('/update-user-pwd')}}" method="post">{{csrf_field()}}
                        <input type="password" name="current_pwd" id="current_pwd" placeholder="Current Password">
                            <spand id="chkPwd"></spand>
                            <input type="password" name="new_pwd" id="new_pwd" placeholder="New Password">
                            <input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password">
                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        $(document).ready(function(){

            $('.dynamic').change(function(){
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('dynamicdependent.fetch2') }}",
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }

                    })
                }
            });

            $('#city').change(function(){
                $('#Baranggay').val('');
                $('#Street').val('');
            });

            $('#Baranggay').change(function(){
                $('#Street').val('');
            });


        });
        </script>
@endsection