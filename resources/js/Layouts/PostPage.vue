<template>

    <br/>
 <a
        :href="route('create',{region1:this.region})"
        class="list-group-item list-group-item-action w-25 float-right text-gray-200 align-text-bottom"
         style="background-color: rgb(00, 00, 00)"
         >
        
        글작성

    </a>

    <div v-for="post in this.postRegion" :key="post.id">

        <a
            :href="route('show',{'id': post.id},{region1:this.region})"
            class="list-group-item list-group-item-action w-100 float-right text-gray-200 "
             style="background-color: rgb(50, 60, 60)"
            >

            {{post.title}}

        </a>

    </div>

   
     <!-- <pagination
     class="d-block float-right"
        v-if="this.getposts.links"
       @click="check"   
        :links="this.getposts.links"
      ></pagination> -->

      
</template>
<script>

    import {InertiaLink} from "@inertiajs/inertia-vue3";
    import Pagination from "./Pagination.vue";
    export default {

        methods: {
            check(){
                console.log(this.postRegion);
            }
        },
        props: [
            'regionN', 'posts'
        ],
        data() {
            return {region: "", getposts: []}
        },
        beforeMount() {
            this.region = this.regionN;
            this.getposts = this.posts;
            // console.log(this.getposts);
            console.log(this.region);
             console.log(this.getposts);
        },
        components: {
            InertiaLink,
            Pagination
        },
        computed: {
            postRegion: function () {

               return this
                    .getposts
                  
                    .filter((post) => {
                        if (post.region == this.region) {
                            return post
                        }

                    });

            }

        }

    }
</script>