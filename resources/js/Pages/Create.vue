
<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="h4 font-weight-bold">Create</h2>
    </template>

    <div class="container mt-5 text-gray-300 ">
      <form @submit.prevent="storePost" enctype="multipart/form-data">
       
          <input type="hidden" name="region77" id="region77" :value=this.region11>
     <!-- 지역값 -->
        <div class="form-group">
          <label for="title">title</label>
          <input
            type="text"
             id="title"
            class="form-control"
            v-model="this.form.title"
          />
        </div>
    
        <div class="form-group text-gray-300">
          <label for="content">content</label>
          <div>
            <textarea
              type="text"
              id="content"
              class="form-control"
              v-model="this.form.content"
            >
            </textarea>
          </div>
      
        </div>

        <br />
        <br />
        <div class="form-group">
          <label for="image">image</label>
          <input type="file" 
          id="image"
  
          @input="this.form.image = $event.target.files[0]" />
                                  
        </div>
     
        <br />
        <br />
        <br />
        <br />
        <br />
        <div>
          <button
         
     type="submit"
            style="color: lavender"
            class="btn btn-secondary"
          >
            완료
          </button>
          &nbsp; &nbsp;

        
        </div>
      </form>
    </div>
  </app-layout>
</template>

<script>

import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";


export default {
   props:['region1'],
   components: {
    AppLayout,
  },



   setup(){
     const form = useForm({
        title: '',
        image: null,
        content: '',
        region: '',
    })
    //form 을 이용하여 post 요청. axios 필요  x

    function storePost() {
      form.post('/post/store')
    }

    return { form, storePost }
  },




  
    data(){
        return{
         region11:'???',
        }
    },

    mounted(){
  
      this.region11 = this.region1;
      console.log(this.region11);//
      this.form.region = this.region11;

    },
    methods:{
     
    }


};
</script>
