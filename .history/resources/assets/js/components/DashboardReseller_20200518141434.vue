<template>
  <div class="widget-box">
    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2">
      <span class="icon">
        <i class></i>
      </span>
      <h5>New Orders count</h5>
    </div>
    <div class="widget-content nopadding fix_hgt" style="height: 500px;">
    <ul class="recent-posts">
        <li>
          <div class="user-thumb">
            <i class="icon-user"></i>
          </div>
          <div class="article-post">
            <span class="user-info">date</span>
            <br />email
            <p>
              <a href="#">New Order ( Reference Number # ). View for more Details</a>
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
export default {
  mounted() {
    console.log("Component mounted.");
    this.new_orders()
  },
  methods:{
      new_orders(){
          alert('haha')
      }
  }
};
</script>
