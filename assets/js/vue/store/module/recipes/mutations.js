import * as types from "../../types";

export default {
    [types.MUTATE_SET_CURRENT](state, recipe){
        state[types.CURRENT] = recipe;
    },
}
