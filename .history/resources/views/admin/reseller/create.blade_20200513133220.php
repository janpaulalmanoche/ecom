@extends('layouts.adminLayout.admin_design')
@section("content")




<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Products</a> </div>
        <h1>Product</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Add Reseller</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/add-product')}}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
                            <!-- enctype for intervention image-->

                            <div class="control-group">
                                <label class="control-label">Under Category</label>
                                <div class="controls">
                                    <select name="category_id" id="cat" style="width:220px;">
                                        <?php echo $categories_dropdown; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Product name</label>
                                <div class="controls">
                                    <input type="text" name="product_name" id="product_name">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Product code</label>
                                <div class="controls">
                                    <input type="text" value="{{$pppin}}-{{$refferenceNO}}" name="product_code" id="product_code">
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Product brand</label>
                                <div class="controls">
                                    <input type="text" name="product_brand" id="product_brand">
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Size</label>
                                <div class="controls">
                                    <input type="text" name="sizes" id="product_brand" style="width:90px;" placeholder="">

                                    <select name="measurements" style="width:110px;">
                                        <?php echo $measurement_dropdown; ?>
                                    </select>
                                </div>
                            </div>


                            {{--<div class="control-group">--}}
                            {{--<label class="control-label">Stock</label>--}}
                            {{--<div class="controls">--}}
                            <input type="hidden" name="stock" id="stock">
                            {{--</div>--}}
                            {{--</div>--}}



                            <div class="control-group">
                                <label class="control-label">description</label>
                                <div class="controls">
                                    <textarea name="description" id="description"></textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Product price</label>
                                <div class="controls">
                                    <input type="text" name="price" id="price">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>



                            <div class="form-actions">
                                <input type="submit" value="Add Product" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection