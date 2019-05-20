<template>
    <div>
        <ul >
            <li v-for="product in products">
                {{product}}
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import * as types from '../../store/types';
    export default {
        data(){
            return{
                products:{

                }
            }
        },
        props:[
            'ingredients'
        ],
        computed:{
            ...mapGetters({
                'current': types.GET_CURRENT_INGREDIENT
            }),
            getProducts: function (){
                if(this.ingredients){
                    return this.getIngredient
                }
            }

        },
        methods:{
            getIngredient(){
                if(this.current){
                    this.ingredients.forEach((ele)=> {
                        const ingredient = ele.ingredient;
                        if( ingredient.id === this.current){
                            const products = ingredient.products
                            this.products = products
                        }
                    })
                }
            }
        }
    }
</script>

<style scoped>

</style>