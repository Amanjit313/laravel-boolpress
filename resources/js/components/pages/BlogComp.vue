<template>

    <div class="blog">
        <div class="blog-container">

            <h1 class="posts-title">POSTS</h1>

            <div class="posts">
                <ul v-for='post in posts' :key='post.id'>
                    <li class="id">#{{ post.id }}</li>
                    <li>{{ post.name }}</li>
                    <li>{{ post.location }}</li>
                    <li>{{ post.email }}</li>
                </ul>
            </div>

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

.blog{
    background-color: #161E2B;
    display: flex;
    color: aqua;
}

.blog-container{
    width: 60%;
    margin: 0 auto;
    margin-top: 50px;
}

.posts-title{
    background-color: #161E2B;
    text-align: center;
    height: 10vh;
    align-items: center;
    justify-content: center;
    display: flex;
    border: 5px solid aqua;
}

.posts{
    background-color: #161E2B;
    border-left: 5px solid aqua;
    border-right: 5px solid aqua;
    border-bottom: 5px solid aqua;
}

ul{
    border-bottom: 2px solid aqua;
    display: flex;
}

.id{
    width: 10%;
}

li{
    list-style: none;
    padding: 5px;
    width: 25%;
}

</style>
