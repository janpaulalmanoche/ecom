<template>
  <div class="widget-box">
 <li class="bg_lh"><a href="#"><i class="icon-globe">
     </i> <strong>8540</strong> <small>Total Profit</small></a>
     </li>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  mounted() {
    console.log("Component mounted.");
    
    // this.mounted = !this.mounted,
     window.setInterval(() => {
    this.new_orders_fetch()
  }, 10000)

     this.new_orders_fetch()
  },
  beforeDestroy(){
// this.mounted = !this.mounted
  },
  props:['user'],
  data(){
      return{
        new_orders:[],
        // mounted:false,
      }
  },
  methods:{
      
      new_orders_fetch(){
        //   alert('haha')
          axios.get('/api/reseller/new-products/' + this.user).then((r)=>{
              this.new_orders = r.data
          })
      },
      view_order_detail(id){
        // alert('test')
        window.location.assign('orders/list/' + id)
      }
  }
};
</script>
