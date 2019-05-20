<template>
    <footer>
        <div class="footer__container container">
            <img :src="img+'LOGO.svg'" alt="" class="footer__logo">
            <div class="footer__socials">
                <img :src="img+'twitter.svg'" alt="" class="footer__socials-icon">
                <img :src="img+'instagram.svg'" alt="" class="footer__socials-icon">
                <img :src="img+'pinterest.svg'" alt="" class="footer__socials-icon">
                <img :src="img+'facebook.svg'" alt="" class="footer__socials-icon">
                <img :src="img+'youtube.svg'" alt="" class="footer__socials-icon">
            </div>
            <div class="footer__rights">
                <p>© 2019 ChefCook Ltd. All Rights Reserved</p>
            </div>
        </div>
    </footer>
</template>

<script>
    import {imgLocation} from "../../api";

    export default {
        computed:{
            img(){
                return imgLocation()
            }
        }
    }
</script>

<style scoped>

</style>