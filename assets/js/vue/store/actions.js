import * as types from './types';
import axios from 'axios';

const findRecipeByIdAndAuthor = ({entities}, recipeId) => {
    return entities.find(({id, author}) => {
        return id === recipeId && author === undefined
    })
}

const findRecipeById = ({entities}, recipeId) => {
    return entities.find(({id}) => {
        return id === recipeId
    })
}

export default {
    [types.ACTION_RECIPES]: async({commit})=>{
        await axios.get('/recipes')
            .then(({data}) => commit(types.MUTATE_SET_RECIPES, data))
            .catch(error=>{
                console.log(error);
            })
    },
    [types.ACTION_RECIPE]: ({commit, state}, recipeId)=> {
        const recipe = findRecipeByIdAndAuthor(state, recipeId);
        if (recipe) {
            axios.get('/recipes/'+recipeId)
                .then(({data})=> commit(types.MUTATE_SET_RECIPE, data))
                .catch(error=>{
                    console.log(error);
                })

        }
    },
    [types.ACTION_RECALCULATED]: ({commit,state}, payload) => {
        const {recipeId, nbPart} = payload;
        const recipe = findRecipeById(state, recipeId);
        if(nbPart <= 0 || nbPart >= 11) {
            return;
        }
        if (recipe && recipe.ingredientsQuantity) {
            const ingredientsQuantity = recipe.ingredientsQuantity.map((ele) => {
                const quantity = Math.round((ele.quantity / recipe.nbPart) * nbPart);
                return {...ele, quantity }
            })
            commit(types.MUTATE_SET_RECIPE, {...recipe, nbPart, ingredientsQuantity})
        }
    }


}