import * as types from './types';

export default {
    [types.GET_RECIPES](state){
        return state[types.RECIPES];
    }
}