<template>
    <footer>
        <img :src="img+'boil.svg'" alt="" class="icon__logo">
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