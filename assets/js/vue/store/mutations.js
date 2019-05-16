import * as types from './types';

export default {
    [types.MUTATE_SET_RECIPES](state, recipes){
        state[types.RECIPES] = recipes;
    },
    [types.MUTATE_SET_RECIPE](state, recipe){
        const recipes = state.entities.reduce((acc, ele) =>  {
            (ele.id === recipe.id) ? acc.push(recipe): acc.push(ele)
            return acc;
        }, []);

        state[types.RECIPES] = recipes;
    },
}