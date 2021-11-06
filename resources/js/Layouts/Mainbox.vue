<template>
  <div class="container"><navbar> </navbar></div>
</template>
<script>
import Navbar from "@/Layouts/Navbar.vue";
export default {
  components: {
    Navbar,
  },
};
</script>
<style lang="scss">
.container {
  width: 1920px;
  height: 1080px;
  background: url("../../img/bg.png") no-repeat;
  animation: fade-in 3.2s cubic-bezier(0.39, 0.575, 0.565, 1) both;
}

@keyframes fade-in {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}
</style>
