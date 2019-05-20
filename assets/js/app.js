import {init as initCollection} from './collectionForm'
import Choices from "choices.js"
import * as types from "./vue/store/types";

/**
 *
 * @param elements
 */
const processChoices = (elements) => {
    Array.from(elements).map((ele) => {
        let options = {removeItemButton: true, resetScrollPosition: false};
        if (ele.attributes.multiple === 'multiple') {
            options = {'multiple': true, ...options}
        }
        new Choices(ele, options);
    })
}

/**
 *
 */
const initSelect = () => {
    const selects = document.querySelectorAll('select')
    const elements = Array.from(selects).reduce((acc,ele)=>{
        (!ele.className.includes('no-choices')) ? acc.push(ele) : null
        return acc;
    }, [])
    if (elements) {
        processChoices(elements)
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initCollection()
    initSelect();
})



document.addEventListener('addIngredient', (e) => processChoices(e.detail.elements));