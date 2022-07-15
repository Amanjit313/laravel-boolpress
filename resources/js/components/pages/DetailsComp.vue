<template>

    <div class="details">

        {{ posts.id }}

    </div>

</template>

<script>
export default {
    name: 'DetailsComp',

    data(){
        return{
            apiUrl: '/api/posts',
            posts: ''
        }
    },

    mounted(){
        this.getApi()
    },

    methods:{
        getApi(){
            axios.get(this.apiUrl + '/' + this.$route.params.slug)
            .then(res =>{
                console.log(res.data)
                this.posts = res.data
            })
        }
    }
}
</script>

<style lang="scss" scoped>

.details{
    background-color: #161E2B;
    display: flex;
    color: aqua;
    height: 90vh; /* DA TOGLIERE DOPO */
    justify-content: center;
    align-items: center;
    font-size: 5rem;
}

</style>
