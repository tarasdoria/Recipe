import * as types from "../../types";

export default {
    [types.GET_CURRENT_INGREDIENT](state){
        return state[types.CURRENT_INGREDIENT]
    }
}