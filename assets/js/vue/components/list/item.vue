<template>
    <li class="list-group-item recipe__list-item" @click="getRecipe(recipe.id)"> {{ recipe.name }}</li>
</template>

<script>
    import {mapActions} from 'vuex';
    import * as types from '../../store/types';
    export default {
        props:[
            'recipe'
        ],
        computed:{
        },
        methods:{
            ...mapActions({
                'getRecipe' : types.ACTION_CURRENT_RECIPE
            })
        }
    }
</script>

<style scoped>

</style>