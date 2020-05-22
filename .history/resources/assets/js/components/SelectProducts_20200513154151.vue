<template>
  <div id>
    <div id="content-header">
      <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home
        </a>
        <a href="#">Resellers</a>
        <a href class="current">View Resellers</a>>
      </div>
      <h1>Resellers</h1>
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
              <h5>View Resellers</h5>
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
                    <th>Price</th>
                    <th>Size</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="gradeX" v-for="products_list in products" :key="products_list.id">
                    <td>{{products_list.product_name}}</td>
                    <td>{{products_list.category.name}}</td>
                    <td>{{products_list.product_code}}</td>
                    <td>{{products_list.brand}}</td>
                    <td>{{products_list.price}}</td>
                    <td>{{products_list.stock}}</td>
                    <td>
                         <img src="asset('/images/backend_images/products/small/{{'$products_list->image}}" style="width:60px;">

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
</template>

<script>
import axios from "axios";

export default {
  mounted() {
    axios.get("/api/reseller/products").then(r => {
      this.products = r.data;
    });
  },
  data() {
    return {
      products: []
    };
  }
};
</script>
