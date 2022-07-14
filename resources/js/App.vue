<template>

    <HeaderComp />

<!--     <div class="container">
        <li v-for="post in posts" :key="post.id">
            <p>{{ post.name }}</p>
        </li>
    </div> -->

</template>

<script>

import HeaderComp from './components/partials/HeaderComp.vue';

export default {
    name: 'App',

    components:{
        HeaderComp
    },

    data(){
        return{
            apiUrl: '/api/posts',
            posts: {}
        }
    },

    methods:{
        getApi(){
            axios.get(this.apiUrl)
            .then(response =>{
                console.log(response.data.posts)
                this.posts = response.data.posts;
            })
        }
    },

    mounted(){
        this.getApi()
    }
}
</script>

<style>

</style>
