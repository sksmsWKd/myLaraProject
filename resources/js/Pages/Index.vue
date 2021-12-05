<template>
    <app-layout title="index">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">

                <select name="crime" id="crime" v-on:change="changes($event)">
                    <option value="0">형법범</option>
                    <option value="1">강력범</option>
                </select>


                <select name="crime" id="crime" v-on:change="changes($event)">
                    <option value="0">형법범</option>
                    <option value="1">강력범</option>
                </select>
                {{ crime }}

            </h2>
            
            <!-- <div id="range" class="demo"> <span v-for="n in 10">{{ n }} </span> </div>
            이거 n 번 반복하시오 예제-->
        
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
        },

        data() {
            return {crime: "asd"}
        },
        mounted() {
            this.crime = this.age;
        },
        methods: {
            changes(event) {

                this.crime = this.age[event.target.value];
      
                console.log(this.crime);
            }
        }
    }
</script>