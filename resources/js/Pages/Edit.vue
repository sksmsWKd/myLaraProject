
<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="h4 font-weight-bold">Edit</h2>
    </template>

    <div class="container mt-5 text-gray-300">
      <form @submit.prevent="submit" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">title</label>
          <input
            type="text"
            name="title"
            class="form-control"
            v-model="post.title"
          />
        </div>
        <div class="form-group text-gray-300">
          <label for="content">content</label>
          <div>
            <textarea
              type="text"
              name="content"
              class="form-control"
              v-model="post.content"
            >
            </textarea>
          </div>
        </div>

        <br />
        <br />
        <div class="form-group">
          <label for="file">file</label>
          <input type="file" name="image" />
        </div>
    <img class="card-img-top" :src=post.image alt="Card image cap">
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

          <button
            type="button"
            onclick="location.href='index'"
            style="color: lavender"
            class="btn btn-dark"
          >
            취소
          </button>
        </div>
      </form>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { InertiaLink, Link, useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    AppLayout,
    InertiaLink,
    Link,
  },
  props: ["post"],
  data(){
  return{
    dpost:null,
  }
},
  mounted(){
    this.dpost=this.post
  },
  methods: {
    submit() {
      this.form.title = this.dpost.title;
      this.form.content = this.dpost.content;
      this.form.post(route("update",{id:this.post.id}), {
        id: this.post.id,
      });
    },
  },
  setup() {
    const form = useForm({
      title: null,
      content: null,
      image: null,
    });

    return { form };
  },
});
</script>
