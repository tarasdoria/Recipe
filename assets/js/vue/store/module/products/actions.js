import * as types from "../../types";

export default {
    [types.ACTION_CURRENT_INGREDIENT]({commit, dispatch}, ingredientId){
        commit(types.MUTATE_SET_CURRENT_INGREDIENT, ingredientId)

    }
}