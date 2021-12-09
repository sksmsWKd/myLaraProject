<template>
	 Lorem ipsum text generatog based on lorem.js for vue.js.
        <br/>
		 

  
 
        <div v-for="post in postRegion" :key="post.id">

            
         <a :href="route('show',{'id': post.id},{region1:this.region})" 
         
         class="list-group-item list-group-item-action">
      
        {{post.title}}

         </a>

        
        
            </div>


        <a :href="route('create',{region1:this.region})" 
         
         class="list-group-item list-group-item-action">
      
        글작성

         </a>

</template>
<script>

import { InertiaLink } from "@inertiajs/inertia-vue3";

export default {
	props:['regionN','posts'],
    data(){
        return{
            region:"",
            getposts:[],
        }
    },
    mounted() {
        this.region= this.regionN;
        this.getposts = this.posts;
        console.log(this.getposts);
        console.log(this.region);
    },
    components:{
        InertiaLink
    },
    computed:{
        postRegion:function(){
         

           return this.getposts.filter( (post)=> {
               if(post.region == this.region){
                     return  post
               }
             
      });

           
    }
    }
}
</script>