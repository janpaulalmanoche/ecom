<template>
  <li class="bg_lh">
    <a href="#">
      <i class="icon-globe"></i>
      <strong>8540</strong>
      <small>Total Profit</small>
    </a>
  </li>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    console.log("Component mounted.");

    window.setInterval(() => {
      this.new_orders_fetch();
    }, 10000);

    this.new_orders_fetch();
  },
  beforeDestroy() {},

  data() {
    return {};
  },
  methods: {
    new_orders_fetch() {}
  }
};
</script>
