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
     
      }
  },
  methods:{
      
      new_orders_fetch(){
    
      },

  }
};
</script>
