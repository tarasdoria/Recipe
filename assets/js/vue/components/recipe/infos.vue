<template>
    <div class="col-12 mb-4">
        <div class="row">
            <div class="col-6 text-center">
                <div class="bg-dark text-white" style="border-radius: 6px 6px 0 0">
                    {{ trans.totalTime | caps }}
                    <span>{{ recipe.prepTime + recipe.cookTime}} min</span>
                </div>
                <div class="d-flex bg-white" style="border-radius: 0 0 6px 6px">
                    <div class="col-6">
                        {{ trans.prepTime }}
                        <span>{{ recipe.prepTime }} min</span>
                    </div>
                    <div class="col-6">
                        {{ trans.cookTime }}
                        <span>{{ recipe.cookTime }} min</span>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <button @click="getRecalculated({'nbPart' :(recipe.nbPart -1), 'recipeId': recipe.id})">-</button>
                <span class="">{{ recipe.nbPart }} {{ trans.nbPart }}</span>
                <button @click="getRecalculated({'nbPart' :(recipe.nbPart +1), 'recipeId': recipe.id})">+</button>
            </div>
            <div class="col-3 text-center">
                <span class="">{{ recipe.cal }} {{ trans.cal }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';
    import * as types from '../../store/types';

    export default {
        props:[
            'recipe',
            'trans'
        ],
        methods:{
            ...mapActions({
                'getRecalculated' : types.ACTION_RECALCULATED
            }),
            nbPartIncrease(){
                this.recipe.nbPart ++
            },
            nbPartDecrease(){
                this.recipe.nbPart --
            }
        }
    }
</script>

<style scoped>

</style>