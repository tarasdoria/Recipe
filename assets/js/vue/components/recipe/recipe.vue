<template>
    <div class="col-8 recipe__container">
        <div v-if="recipe" class="bg-light container pt-3">
            <div class="row">
                <recipe-author :recipe="recipe" :trans="trans"></recipe-author>
                <recipe-infos :recipe="recipe" :trans="trans"></recipe-infos>
                <recipe-preparation :recipe="recipe" :trans="trans"></recipe-preparation>
            </div>
        </div>
        <div v-else>
            <recipe-grid :recipe="recipe" :trans="trans"></recipe-grid>
        </div>
    </div>
</template>

<script>
    import {trans} from '../../api'
    import * as types from '../../store/types';
    import {mapGetters} from 'vuex';
    import Author from './author';
    import Infos from './infos';
    import Preparation from './preparation';
    import Grid from './grid';

    export default {
        components: {
            recipeGrid: Grid,
            recipeAuthor: Author,
            recipeInfos: Infos,
            recipePreparation: Preparation,
        },
        data() {
            return {
                trans: {
                    choose: trans('api.recipe.choose'),
                    totalTime: trans('api.recipe.time.total'),
                    prepTime: trans('api.recipe.time.prep'),
                    cookTime: trans('api.recipe.time.cook'),
                    nbPart: trans('api.recipe.nbPart'),
                    cal: trans('api.recipe.cal'),
                    ingredients: trans('api.recipe.ingredients'),
                    preparation: trans('api.recipe.preparation'),

                },
            }
        },
        computed: {
            ...mapGetters({
                'current': types.GET_CURRENT,
                'recipes': types.GET_RECIPES
            }),
            recipe: function () {
                return this.recipes.find(({id}) => id === this.current);
            },
        }
    }
</script>

<style scoped>

</style>