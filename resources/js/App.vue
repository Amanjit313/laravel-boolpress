<template>

    <div class="container">
        <li v-for="post in posts" :key="post.id">
            <p>{{ post.name }}</p>
        </li>
    </div>

</template>

<script>

export default {
    name: 'App',

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
