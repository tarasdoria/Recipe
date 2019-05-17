<template>
    <div class="recipe__grid-container">
        <div class="row">
            <div class="col-4 recipe__grid-item" v-for="recipe in getRecipes" >
                <img :src="recipeImg(recipe.image)" class="item-background">
                <div class="item-hover">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    import * as types from '../../store/types';
    export default {
        props:[
            'trans'
        ],
        computed: {
            ...mapGetters ({
                'getRecipes': types.GET_RECIPES,
            }),
        },

        methods: {
            recipeImg(image){
                if(image === undefined || image === null) return;
                return location.origin+'/uploads/img/'+image.name;
            }
        }
    }

</script>

<style scoped>

</style>