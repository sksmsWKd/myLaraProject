<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="h4 font-weight-bold">Show</h2>
    </template>

    <div class="m-20 flex justify-center">
      <div class="card">
        <div class="card-body">
           <img class="card-img-top" :src=posts.image alt="Card image cap">
                               
          <ul class="list-group list-group-flush">
            <li class="list-group-item">dlalwl :</li>
            
            <li class="list-group-item">제목 : {{ posts.title }}</li>
            <li class="list-group-item">내용 :{{ posts.content }}</li>
            <li class="list-group-item">등록일 :{{ posts.created_at }}</li>
            <li class="list-group-item">작성자 : {{ posts.user_id }}</li>
            <li class="list-group-item">
              <div class="btn-group">
                <a
                  :href="route('edit', { id: posts.id })"
                  class="btn btn-warning mr-1"
                  method="get"
                  >수정하기</a
                >
                 

                  <button id="dbtn" class="btn btn-warning" @click.prevent="postDelete(posts.id)">삭제하기</button>
            
              </div>
            </li>
            <div class="card" style="width: 30rem">
              <div class="card-body">댓글</div>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { InertiaLink } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    AppLayout,
    InertiaLink,
  },
  props: ["posts"],
  methods:{
  postDelete(id){
     
    axios.delete("/post/delete/"+id,{ 
      preserveScroll: true,
        onSuccess: () => this.form.reset()
        }).then().catch();
        $('#dbtn').click(function() {
        $(this).attr('disabled','disabled');
        location.replace('/question')
});

  }
  }
});
</script>



