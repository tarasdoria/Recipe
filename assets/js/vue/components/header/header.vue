<template>
    <div class="header__container">
        <div class="header__greetings">
            <img :src="img+'LOGO.svg'" alt="" class="header__greetings-logo">
        </div>
        <div class="header__background">
        </div>
        <app-nav></app-nav>
    </div>
</template>

<script>
    import {imgLocation} from "../../api";
    import Navbar from './navbar'
    export default {
        components:{
            appNav: Navbar,
        },
        computed:{
            img(){
                return imgLocation();
            }
        }
    }
</script>

<style scoped>

</style>