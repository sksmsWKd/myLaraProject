<template>
   
    <br/>
    <pagination
        @pageClicked="getPage($event)"
        v-if="this.getdArray.data != null"
        :links="this.getdArray.links"
      />
 <a
        :href="route('create',{region1:this.region})"
        class="list-group-item list-group-item-action w-25 float-right text-gray-200 align-text-bottom"
         style="background-color: rgb(00, 00, 00)"
         >
        
        글작성
         
 <!-- {{ this.getdArray }} -->
    </a>

    <div v-for="post in this.getdArray.data" :key="post.id">

        <a
            :href="route('show',{'id': post.id},{region1:this.region})"
            class="list-group-item list-group-item-action w-100 float-right text-gray-200 "
             style="background-color: rgb(50, 60, 60)"
            >

            {{post.title}}

        </a>

    </div>

  

  
 
      
</template>
<script>

    import {InertiaLink} from "@inertiajs/inertia-vue3";
    import Pagination from "./Pagination.vue";
    export default {
data(){
return{
    postdata: []
}
},
        methods: {
            check(){
                console.log(this.postRegion);
            },
             getPage(url) {
      axios
        .get(url)
        .then((res) => {
           this.getdArray = res.data.dArray[0];
        
      
        })
        .catch((err) => {
          console.log(err);
        });
    },
        },
        props: [
            'regionN', 'posts','dArray'
        ],
        data() {
            return {region: "", getposts: [],getdArray:[]}
        },
        beforeMount() {
            this.region = this.regionN;
            this.getposts = this.posts;
            this.getdArray=this.dArray;
            // console.log(this.getposts);
            console.log(this.region);
             console.log(this.getposts);
             console.log(this.getdArray);
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
            //computed 로 필요한 데이터만 반환
            //.filter 함수는 배열에 적용가능하며 배열내 각 원소에 적용

        }

    }
</script>