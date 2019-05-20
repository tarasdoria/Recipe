<template>
    <div class="col-12 text-center mb-3">
        <h2 class="font-weight-bold">{{ recipe.name }}</h2>
        <div class="row ">
            <transition name="fade" appear>
                <div class="col-3 author-img text-center">
                    <img :src="authorImg+'user.png'" style="width: 100px;height: 100px">
                    <h4>{{ recipe.author }}</h4>
                </div>
            </transition>
            <div class="col-9 text-center">
                <img :src="recipeImg" style="width: 400px; height: 140px;">
            </div>
        </div>
    </div>
</template>

<script>
    import {getRecipeImg, imgLocation} from '../../api'

    export default {
        data (){
            return{

            }
        },
        props:[
            'recipe',
            'trans'
        ],
        computed:{
            recipeImg(){
                return getRecipeImg(this.recipe.image)
            },
            authorImg(){
                return imgLocation()
            }
        },
    }
</script>

<style scoped>
    .fade-leave{
        opacity: 0;
    }
    .fade-leave-active{
        opacity: 1;
    }
</style>