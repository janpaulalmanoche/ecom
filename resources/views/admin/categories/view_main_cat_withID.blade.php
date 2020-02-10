@extends('layouts.adminLayout.admin_design')
@section("content")

    <script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>



    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Add Sub Category</a> </div>
            <h1>Add Sub Category</h1>

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
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add Sub Category</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form  class="form-horizontal" enctype = "multipart/form-data" method="post" action="{{url('/admin/insert-sub-cat/'.$getMainCatDetails->id)}}" name="add_attribute" id="add_attribute" >{{ csrf_field() }}
                            <!-- enctype for intervention image-->
                                <input type="hidden" name="maincat_id" value="{{$getMainCatDetails->id}}">
                                <!--pass the value id here  as hidden and use it to save on the table in controller function-->

                                <div class="control-group">
                                    <label class="control-label">Main Category</label>
                                    <label class="control-label"><strong>{{ $getMainCatDetails->name }}</strong></label>
                                </div>

                                {{--<div class="control-group">--}}
                                    {{--<label class="control-label">Product code</label>--}}
                                    {{--<label class="control-label"><strong>{{ $productDetails->product_code }}</strong></label>--}}
                                {{--</div>--}}





                                <div class="control-group"><!--(opening)for jquery add or remove textfield dynamicaly -->
                                    <label class="control-label"></label>
                                    <div class="controls">
                                        <div class="field_wrapper">
                                            <div>
                                                Sub Category Name: <input type="text" name="subcatname[]" id="sku"  style="width:160px;" required />

                                                {{--<input type="text" name="size[]" id="size" placeholder="Size" style="width:120px;" required />--}}
                                                {{--<input type="text" name="price[]" id="price" placeholder="Price" style="width:120px;" required/>--}}
                                                {{--<input type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;"required />--}}

                                                <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--closing-->



                                <div class="form-actions">
                                    <input type="submit" value="Add Sub Category" class="btn btn-success">
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>


        </div>

    </div>

    <script>
        //jquery for adding or removing textfield dynamic
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                '<div style="">  Sub Category Name: <input type="text" name="subcatname[]" id="sku"  style="width:160px;margin-top:5px;" required />' +
                // '<input type="text" name="size[]" id="size" placeholder="Size" style="width:120px; margin-right:3px; margin-top:5px;"/>' +
                // '<input type="text" name="price[]" id="price" placeholder="Price" style="width:120px; margin-right:3px; margin-top:5px;"/>' +
                // '<input type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px; margin-right:1px; margin-top:5px;"/>' +

                '<a href="javascript:void(0);" class="remove_button">remove</a></div>'; //New input field html
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });//closing


    </script>

@endsection