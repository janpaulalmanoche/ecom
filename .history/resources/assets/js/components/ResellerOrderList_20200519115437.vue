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
      <h1>Orders</h1>
    </div>
    <div class="container-fluid">
      <modal
        name="hello-world"
        class="v--modal vue-dialog"
        :height="140"
        :pivotY="0.5"
        :pivotX="0.5"
        @before-close="beforeClose"
      >
        
          <div class="dialog-content">
            <div
              class="dialog-c-title"
            >Product : {{selected_product_information.product_name}} | Warehouse Price : {{selected_product_information.price}}</div>

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
              @click="save"
            >Add to you list</button>

            <button
              type="button"
              class="vue-dialog-button"
              style="flex: 1 1 50%;color:red;font-weight:bold"
              @click="close_modal"
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
              <h5>Date Ordered  <span style="padding:2px 5px;background-color:red;color:white">{{new Date().toLocaleString()}} </span>
              
              </h5>
              <input type="date" class="form-control" style="height:28px">

              
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <!--column names -->
                    <th>Refference number</th>
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
  props: ["date-now"],
  mounted() {
    this.fetch();

    //    console.log(this.user)
  },

  data() {
    return {
      products: [],
      selected_product_information: {},
      product_field_price: ""
    };
  },
  methods: {
    fetch() {
      axios.get("/api/reseller/products").then(r => {
        this.products = r.data;
      });
    },
    modal_show(products_data) {
      this.$modal.show("hello-world");
      this.selected_product_information = products_data;
    },
    close_modal(){
      this.$modal.hide("hello-world");
    },
    beforeClose(event) {
      // console.log(event)
      this.product_field_price = "";
    },
    save() {
      if (this.product_field_price == "") {
    let timerInterval
Swal.fire({
  title: 'Input Resell price',
  html: 'closing in <b></b>.',
  timer: 2000,
  timerProgressBar: true,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
      } else {
        axios
          .post("/api/reseller/products", {
            product_id: this.selected_product_information.id,
            user_id: this.user,
            resell_price: this.product_field_price
          })
          .then(r => {
            Swal.fire(
              "Good job!",
              "Product Successfullly added your list!",
              "success"
            );
            this.close_modal()
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
  }
};
</script>
