<template>
    <div class="header__container">
        <div class="header__greetings">
            <h1>Welcome</h1>
            <p>to Recipe Site !</p>
        </div>
        <div class="header__background">
        </div>
        <div class="header__navbar">
            <app-nav></app-nav>
        </div>
    </div>
</template>

<script>
    import Navbar from '../../components/navbar/navbar'
    export default {
        components:{
            appNav: Navbar,
        },
    }
</script>

<style scoped>

</style>