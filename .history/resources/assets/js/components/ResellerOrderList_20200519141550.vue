<template>
  <div>
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
      
      <hr />
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title">
              <span class="icon">
                <i class="icon-th"></i>
              </span>
              <h5>
                  
                  <div v-if="all_orders != true">
                  Date Ordered  <span style="padding:2px 5px;background-color:red;color:white">{{input_date}} </span>
               
                  </div>
                  <p v-else>All Orders  </p>
              
              </h5>
              <input type="date" class="form-control" style="height:28px" v-model="input_date" @change="fetch_by_date" >
   all orders
              
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <!--column names -->
                    <th>Refference number</th>
                  
                    <!-- <th>Actions</th> -->
                  </tr>
                </thead>
                <tbody>
                  <tr class="gradeX" v-for="orders_list in orders" :key="orders_list.id">
                    <td 
                    > {{orders_list.refference_number}} </td>

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

export default {
  props: ["date","user"],
  mounted() {
    this.fetch();

  },

  data() {
    return {
      orders: [],
      input_date: this.date,
      all_orders:true
    }
  },
  methods: {

    fetch() {
      axios.get("/api/reseller/orders/list/" + this.user ).then(r => {
        this.orders = r.data;
      });
    },
    fetch_by_date(){
        this.all_orders = false
    }
    
    
      
    
  }
};
</script>
<style scoped>

</style>

