export const init = () => {

    const listItem = document.querySelector(".recipe__list")
    if (!listItem) return;
    listItem.addEventListener('click', (e) => {
        removeClass(listItem)
        e.target.className += ' active'
    })


    const removeClass = (listItem) => {
        listItem.children.forEach(el => {
            el.classList.remove("active")
        })
    }
}