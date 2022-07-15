<template>

    <div class="blog">
        <div class="blog-container">

            <h1 class="posts-title">POSTS</h1>

            <table>

                <thead>
                    <tr>
                        <th>POST #ID</th>
                        <th>NAME</th>
                        <th>LOCATION</th>
                        <th>EMAIL</th>
                        <th>DETAILS</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for='post in posts' :key='post.id'>
                        <td>#{{ post.id }}</td>
                        <td>{{ post.name }}</td>
                        <td>{{ post.location }}</td>
                        <td>{{ post.email }}</td>
                        <td class="details-link"><router-link class="details-style" :to="{name:'details', params:{slug: post.slug}}">Details</router-link></td>
                    </tr>
                </tbody>

            </table>

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

table{
    text-align: center;
    border-left: 5px solid aqua;
    border-right: 5px solid aqua;
    border-bottom: 5px solid aqua;
}

tr{
    width: 100%;
}

.details-style{

    color: aqua;

    &:hover{
        opacity: 50%;
        cursor: pointer;
    }
}

th,
td{
    padding: 10px;
    width: 10%;
    border: 1px solid aqua;
}

</style>
