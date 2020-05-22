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
                      <button class="btn btn-primary" @click="save(products_list)">Add To list</button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div
                class="v--modal-box v--modal"
                style="top: 0px; left: 440px; width: 656px; height: 400px;"
              >
                <div class="box">
                  <div id="bp-left" class="box-part">
                    <div id="partition-register" class="partition">
                      <div class="partition-title">CREATE ACCOUNT</div>
                      <div class="partition-form">
                        <form autocomplete="false">
                          <div class="autocomplete-fix">
                            <input type="password" />
                          </div>
                          <input id="n-email" type="text" placeholder="Email" />
                          <input id="n-username" type="text" placeholder="Username" />
                          <input id="n-password2" type="password" placeholder="Password" />
                        </form>
                        <div style="margin-top: 42px;"></div>
                        <div class="button-set">
                          <button id="goto-signin-btn">Sign In</button>
                          <button id="register-btn">Register</button>
                        </div>
                        <button class="large-btn github-btn">
                          connect with
                          <span>github</span>
                        </button>
                        <button class="large-btn facebook-btn">
                          connect with
                          <span>facebook</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div id="bp-right" class="box-part">
                    <div class="box-messages"></div>
                  </div>
                </div>
                <!---->
              </div>
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
Vue.use(VModal, { dynamic: true, dynamicDefaults: { clickToClose: false } });

export default {
  props: ["user"],
  mounted() {
    this.fetch();
    this.$modal.show("hello-world");
    //    console.log(this.user)
  },

  data() {
    return {
      products: []
    };
  },
  methods: {
    fetch() {
      axios.get("/api/reseller/products").then(r => {
        this.products = r.data;
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
