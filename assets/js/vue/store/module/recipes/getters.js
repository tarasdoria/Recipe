import * as types from "../../types";

export default {
    [types.GET_CURRENT](state){
        return state[types.CURRENT]
    }
}