<template>

    <div>
        <h1>I MIEI POSTS:</h1>

        <div>
            <ul v-for='post in posts' :key='post.id'>
                <li>{{ post.name }}</li>
            </ul>
        </div>

    </div>

</template>

<script>
export default {
    name: 'BlogComp',

    data(){
        return{
            apiUrl: '/api/posts',
            posts: null
        }
    },

    methods:{
        getApi(){
            axios.get(this.apiUrl)
            .then(res =>{
                this.posts = res.data.posts;
            })
        }
    },

    mounted(){
        this.getApi()
    }
}
</script>

<style lang="scss" scoped>

</style>
