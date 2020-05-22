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
          <modal name="hello-world"  class=" v--modal vue-dialog"
                :height="125" :pivotY="0.5" :pivotX="0.5"
                  >
              
                  <div class="dialog-content">
                    <div class="dialog-c-title">Alert!</div>
                    <div class="dialog-c-text">low carb milk</div>
                  </div>
                  <div class="vue-dialog-buttons">
                    <button
                      type="button"
                      class="vue-dialog-button"
                      style="flex: 1 1 50%;"
                    >Deal with it</button>
                    <button type="button" class="vue-dialog-button" style="flex: 1 1 50%;">Close</button>
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
                  <tr class="gradeX" v-for="products_list in products" :key="products_list.id">
                    <td>{{products_list.product_name}}</td>
                    <td>{{products_list.category.name}}</td>
                    <td>{{products_list.product_code}}</td>
                    <td>{{products_list.brand}}</td>
                    <td>{{products_list.price}}</td>
                    <td>{{products_list.size}}</td>
                    <td>{{products_list.stock}}</td>
                    <td>
                      <img :src="products_list.image_path" style="width:60px;" />
                    </td>
                    <td>
                      <button class="btn btn-primary" @click="modal_show(products_list)">Add To list</button>
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
import axios from "axios";
import Swal from "sweetalert2";
import VModal from "vue-js-modal";
Vue.use(VModal, { dialog: true });

export default {
  props: ["user"],
  mounted() {
    this.fetch();
    // this.modal_show();
    //    console.log(this.user)
    this.$modal.show("hello-world");
  },

  data() {
    return {
      products: [],
      selected_product_price: ""
    };
  },
  methods: {
    fetch() {
      axios.get("/api/reseller/products").then(r => {
        this.products = r.data;
      });
    },
    modal_show(products_list) {
      this.$modal.show("dialog", {
        title: "Alert!",
        text: products_list.product_name,
        buttons: [
          {
            title: "Deal with it",
            handler: () => {
              alert("Woot!");
            }
          },
          {
            title: "Close"
          }
        ]
      });
    },
    save(products_list) {
      axios
        .post("/api/reseller/products", {
          product_id: products_list.id,
          user_id: this.user
        })
        .then(r => {
          Swal.fire(
            "Good job!",
            "Product Successfullly added your list!",
            "success"
          );
        })
        .catch(e => {
          // console.log(e.response.data)
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: e.response.data
            // footer: "n"
          });
        });
    }
  }
};
</script>
