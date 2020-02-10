@extends('layouts.adminLayout.admin_design')
@section("content")




    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Product Attributes</a> </div>
            <h1>Product Attribute</h1>

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
                            <h5>Add Product Attributes</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form  class="form-horizontal" enctype = "multipart/form-data" method="post" action="{{url('/admin/add-attributes/'.$productDetails->id)}}" name="add_attribute" id="add_attribute" >{{ csrf_field() }}
                            <!-- enctype for intervention image-->
                                <input type="hidden" name="product_id" value="{{$productDetails->product_id}}">
                                <!--pass the value id here  as hidden and use it to save on the table in controller function-->

                                <div class="control-group">
                                    <label class="control-label">Product name</label>
                                    <label class="control-label"><strong>{{ $productDetails->product_name }}</strong></label>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Product code</label>
                                    <label class="control-label"><strong>{{ $productDetails->product_code }}</strong></label>
                                </div>




                                <div class="control-group"><!--(opening)for jquery add or remove textfield dynamicaly -->
                                    <label class="control-label"></label>
                                    <div class="controls">
                                <div class="field_wrapper">
                                    <div>
                                        <input type="text"  VALUE="{{ $productDetails->product_code }}" name="sku[]" id="sku" placeholder="SKU" style="width:120px;" required />
                                        <input type="text" name="size[]" id="size" placeholder="Size" style="width:120px;" required />

                                        <select name="measurements[]" style="width:110px;">
                                            <?php  echo $measurement_dropdown; ?>
                                        </select>
                                        <input type="text" name="price[]" id="price" placeholder="Price" style="width:120px;" required/>
                                        <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;"required />

                                        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                    </div>
                                </div>
                                </div>
                                </div><!--closing-->



                                <div class="form-actions">
                                    <input type="submit" value="Add Product" class="btn btn-success">
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>

            <div class="row-fluid"><!--data table oepning -->
                <div class="span12">

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Attributes</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <!--data table update form opening-->
                            <form action="{{url('admin/edit-attributes/'.$productDetails->id)}}" method="post">{{csrf_field()}}

                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <!--column names -->
                                    <th>Product ID</th>
                                    <th>Product Code</th>
                                    <th>Size</th>
                                    <th>Measurement</th>
                                    <th>Price</th>
                                    <th>Stock</th>


                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productDetails->attributes as $attribute)
                                    <td><input type="hidden" name="idAttr[]" value="{{$attribute->id}}"></td>
                                    <!--$categories is our variable name in CategoryController inside our view
                                public function viewCategories(); and we use compact to pass it and our variable name is $categories-->

                                    <tr class="gradeX">

                                        <td style="width: 50px;">{{ $attribute->product_id }}</td>
                                        <td>{{$attribute->product_code}}</td>
                                        <td><input type="text" name="sizee[]" value="{{$attribute->size}}" style="width: 50px;"></td>
                                        <td style="width:110px;">
                                            <select name="measurements2[]" style="width:110px;">
                                                <?php  echo $measurement_dropdown2; ?>
                                            </select>
                                        </td>
                                        <td><input type="text" name="pricee[]" value="{{$attribute->price}}" style="width: 50px;"></td>  <!--//category_namee is in our conroller-->
                                        <td><input type="text" name="stockk[]" value="{{$attribute->stock}}" style="width: 50px;"></td>


                                            <td class="center">

                                            <input type="submit" value="Update" class="btn btn-primary btn-mini">
                                                <a id="delProduct" rel="{{ $attribute->id }}" rel1="delete-attribute" href="javascript:"  class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                                <!-- rel1 is our url -->
                                              </td>
                                           </tr>

                                  <!--<div id="myModal{product->id}}" clas="modal hide">
                                        <div class="modal-header">
                                            <buttom data-dismiss="modal" class="close" type="button">x</buttom>
                                            <h3><{product->product_name}} Full datails</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Product ID: {product->id}}</p>
                                            <p>Product NAme: {product->name}}</p>

                                        </div>

                                        </div> -->
                                @endforeach

                                </tbody>
                            </table>
                        </form>
                        </div>
                    </div>
                </div>
            </div><!--data table closing -->
        </div>

        </div>
    </div>

@endsection