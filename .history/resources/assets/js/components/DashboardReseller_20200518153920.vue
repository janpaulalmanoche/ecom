<template>
  <div class="widget-box">
    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2">
      <span class="icon">
        <i class></i>
      </span>
      <h5>New Orders count</h5>
    </div>
    <div class="widget-content nopadding fix_hgt" style="height: 500px;">
    <ul class="recent-posts" v-for="orders in new_orders" :key="orders.id">
        <li>
          <div class="user-thumb">
            <i class="icon-user"></i>
          </div>
          <div class="article-post">
            <span class="user-info">{{orders.created_at}}</span>
            <br />{{orders.customer.email}}
            <br />{{orders.customer.city}}  | {{orders.customer.f_name}} {{orders.customer.l_name}}
            <br />
            <p>
              <span style="color:green">New Order Reference Number ( # {{orders.refference_number}} )</span>
            </p>
          </div>
          <a href>
            <button class="btn-primary">View</button>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  mounted() {
    console.log("Component mounted.");
    this.new_orders_fetch();
//    console.log( this.user)
  },
  props:['user'],
  data(){
      return{
        new_orders:[]
      }
  },
  methods:{
      new_orders_fetch(){
        //   alert('haha')
          axios.get('/api/reseller/new-products/' + this.user).then((r)=>{
              this.new_orders = r.data
          })
      }
  }
};
</script>
