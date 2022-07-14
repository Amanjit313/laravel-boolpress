<template>

    <header>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Chi siamo</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contatti</a></li>
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
