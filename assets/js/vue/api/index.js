import Translator from 'bazinga-translator';
import {init as initList} from "./activeList";

export const imgLocation = () =>{
    return location.origin+'/images/';
}

export const trans = (key) => {
    return Translator.trans(key,{}, 'messages')
};
export const decodeHTML = (html) => {
    if(html === undefined) return;
    let txt = document.createElement('textarea');
    txt.innerHTML = html;
    return txt.value;
};

export const getRecipeImg = (image) => {
    if(image === undefined || image === null) return;
    return location.origin+'/uploads/img/'+image.name;
};


document.addEventListener('DOMContentLoaded', () => {
    initList()
});