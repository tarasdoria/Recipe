<template>
    <div class="col-4">
        <h2>{{ trans.title }}</h2>
        <form class="form-inline mb-4">
            <div class="form-group w-100">
                <input class="w-100" type="text" :placeholder="trans.placeholder" v-model="searchFilter">
            </div>
<!--            <button class="btn btn-primary ml-auto">{{ trans.button }}</button>-->
        </form>
        <ul class="list-group recipe__list">
            <app-recipe v-for="recipe in filteredList" :key="recipe.id" :recipe=recipe></app-recipe>
        </ul>
        <span v-if="filteredList.length<1" class=" alert alert-danger border border-danger">{{ trans.error }}</span>
    </div>
</template>

<script>
    import {trans} from '../../api'
    import Recipe from './item'
    import {mapGetters} from 'vuex'
    import * as types from '../../store/types';
    export default {
        components: {
          appRecipe : Recipe
        },
        data(){
            return{
                trans:{
                    title: trans('api.list.title'),
                    button: trans('api.list.button'),
                    error: trans('api.list.error'),
                    placeholder: trans('api.list.placeholder')
                },
                searchFilter: ''
            }
        },
        computed: {
            ...mapGetters ({
                'getRecipes': types.GET_RECIPES,
            }),
            filteredList (){
                const search = this.searchFilter.toLowerCase().trim();
                return this.getRecipes.filter(recipe =>
                     recipe.name.toLowerCase().includes(search)
                )
            }
        }
    }
</script>

<style scoped>

</style>
