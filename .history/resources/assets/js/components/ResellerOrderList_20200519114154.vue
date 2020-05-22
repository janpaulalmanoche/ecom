<template>
  <div id>
    <div id="content-header">
      <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home
        </a>
        <a href="#">Products</a>
        <a href class="current">Available Products</a>
      </div>
      <h1>Available Product</h1>
    </div>
    <div class="container-fluid">
      <modal
        name="hello-world"
        class="v--modal vue-dialog"
        :height="140"
        :pivotY="0.5"
        :pivotX="0.5"
      
      >
        
          <div class="dialog-content">
            <div
              class="dialog-c-title"
            >
            </div>

            <div class="dialog-c-text">
              * Resell Price
              <input type="number" style="width:78%" v-model="product_field_price" required />
            </div>
          </div>
          <div class="vue-dialog-buttons">
            <button
              type="submit"
              class="vue-dialog-button"
              style="flex: 1 1 50%;color:blue;font-weight:bold"
          
            >Add to you list</button>

            <button
              type="button"
              class="vue-dialog-button"
              style="flex: 1 1 50%;color:red;font-weight:bold"
           
            >Close</button>
          </div>
          <!---->
       
      </modal>
      <hr />
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title">
              <span class="icon">
                <i class="icon-th"></i>
              </span>
              <h5>View Products</h5>
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
                  <tr class="gradeX" >
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <img :src="products_list.image_path" style="width:60px;" />
                    </td>
                    <td>
                      <button class="btn btn-primary" >Add To list</button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <v-dialog />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  mounted() {
    console.log("Component mountedfffff.");


  },
  beforeDestroy(){
// this.mounted = !this.mounted
  },

  data(){
      return{
      
      }
  },
  methods:{

  }
};
</script>
