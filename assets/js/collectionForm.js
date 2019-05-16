let index;

export const init = () => {
    const container = document.querySelector('#recipe_ingredientsQuantity')
    if(!container) return
    index = container.querySelectorAll('input').length
    const add_ingredient = document.querySelector('#add_ingredient')

    add_ingredient.addEventListener('click', (e) =>{
        addIngredient(container)
        e.preventDefault()
    })
}

/**
 * @param container
 */
const addIngredient = (container) => {
    let template = container.getAttribute('data-prototype')
        .replace(/__name__label__/g, 'Ingredient n°' + (index+1))
        .replace(/__name__/g, index);

    template = createElementFromHTML(template)

    addDeleteLink(template);

    container.append(template);
    const elements = template.querySelectorAll('select')
    document.dispatchEvent(new CustomEvent('addIngredient', { 'detail': {elements} }));
    index++;
}

/**
 *
 * @param template
 */
const addDeleteLink = (template) => {
    // console.log(deleteLink);
    let deleteLink = document.createElement('a');
    deleteLink.href = '#';
    deleteLink.className = 'btn btn-danger';
    deleteLink.text = 'Supprimer';
    template.append(deleteLink);

    deleteLink.addEventListener('click', function (e) {
        template.remove();
        index--;
        e.preventDefault();
        return false;
    });
}

/**
 *
 * @param htmlString
 * @returns {ChildNode}
 */
const createElementFromHTML = (htmlString) => {
    const div = document.createElement('div');
    div.innerHTML = htmlString;

    return div.firstChild;
}
