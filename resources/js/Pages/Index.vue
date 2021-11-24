<template>
    <app-layout title="index">
         <template #header>
      <h2 class="font-semibold text-xl text-gray-200 leading-tight">
				Index  {{ age }}
      </h2>
          </template>
     

	  

    </app-layout>
</template>
<script>
  import AppLayout from "@/Layouts/AppLayout.vue";
    import Navbar from "@/Layouts/Navbar.vue";
export default {
 props: ['age'],

	  components: {
            Navbar,
            AppLayout
	  }
}
</script>


