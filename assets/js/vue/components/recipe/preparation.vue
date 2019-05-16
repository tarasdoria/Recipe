<template>
    <div class="col-12 border-top">
        <div class="row">
            <div class="col-4 border-right py-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>{{ trans.ingredients }}</h4>
                    </div>
                </div>
                <div class="row px-3">
                    <ul class="list-group w-100">
                        <li class="list-group-item" v-for="ingredient in recipe.ingredientsQuantity">
                            <img :src="ingImg(ingredient.ingredient.image)" style="width: 50px">
                            {{ ingredient.quantity }} {{ingredient.unit}} {{ ingredient.ingredient.name }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-8 py-3">
                <div class="row">
                    <div class="col-12">
                        <h4>{{ trans.preparation }}</h4>
                        <span v-html="html"></span>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {decodeHTML, imgLocation} from '../../api'
    export default {
        data(){
            return{

            }
        },
        props:[
            'recipe',
            'trans'
        ],
        computed:{
            html(){
                return decodeHTML(this.recipe.description)
            },
            img(){
                return imgLocation()
            },
        },
        methods:{
            ingImg(image){
                return location.origin+'/uploads/img/'+image.name
            }
        }
    }
</script>

<style scoped>

</style>