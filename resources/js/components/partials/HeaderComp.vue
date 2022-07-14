<template>

    <header>
        <ul>
            <li><router-link :to="{name:'home'}">Home</router-link></li>
            <li><router-link :to="{name:'about'}">Chi Siamo</router-link></li>
            <li><router-link :to="{name:'blog'}">Blog</router-link></li>
            <li><router-link :to="{name:'contacts'}">Contatti</router-link></li>
        </ul>
    </header>

</template>

<script>
export default {
    name: 'HeaderComp',

    data(){
        return{

        }
    }
}
</script>

<style lang="scss" scoped>

header{
    background-color: #161E2B;
    height: 10vh;
}

ul{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

li{
    list-style: none;
    margin: 0px 20px;
}

a{
    color: white;
    text-decoration: none;
    font-size: 1.2rem;

    &:hover,
    &.active{
        text-decoration: underline;
        color: aqua;
    }

}

</style>
