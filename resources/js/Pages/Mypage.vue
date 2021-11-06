<template>
  <div>
    <mainbox></mainbox>
    <mainbox />
  </div>
</template>
<script>
import Navbar from "@/Layouts/Navbar.vue";
import Mainbox from "@/Layouts/Mainbox.vue";

export default {
  components: {
    Navbar,
    Mainbox,
  },
};
</script>
<style lang="scss">
.navbar {
  z-index: 1;
}
</style>
