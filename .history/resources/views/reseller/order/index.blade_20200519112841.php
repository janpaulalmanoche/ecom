@extends ('layouts.resellerLayout.reseller_design_no_js')
@section('content')

<div id>
    <div id="content-header">
      <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home
        </a>
        <a href="#">Products</a>
        <a href class="current">Your Product's</a>
      </div>
      <h1>Your Product's</h1>
    </div>
    <div class="container-fluid">
      <hr />
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title">
              <span class="icon">
                <i class="icon-th"></i>
              </span>
              <h5>Product's list</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <!--column names -->
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>Product Code</th>
                    <th>Brand</th>
                    <th>Original Price</th>
                    <th>Resell Price</th>
                    <th>Size</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
              
                  <tr class="gradeX" >
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>
                    <!-- <img src="{{asset('/images/backend_images/products/small/'.$products->products()->first()->image)
                                                }}" style="width:60px;"> -->
                    </td>
                    <td>
                      <!-- <button class="btn btn-primary" >Add To list</button> -->
                    </td>
                  </tr>
            
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection