import * as types from "../../types";

export default {
    [types.ACTION_CURRENT_RECIPE]({commit, dispatch}, recipeId){
        commit(types.MUTATE_SET_CURRENT, recipeId)
        dispatch(types.ACTION_RECIPE, recipeId)

    }
}