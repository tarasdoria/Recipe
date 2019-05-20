import * as types from "../../types";

export default {
    [types.MUTATE_SET_CURRENT_INGREDIENT](state, ingredient){
        state[types.CURRENT_INGREDIENT] = ingredient;
    },
}
