import "@babel/polyfill";


document.addEventListener('DOMContentLoaded', () => {
    const menuTrigger = document.querySelector('.header__menu-trigger');
    const menuContent = document.querySelector('.header__menu-content');
    menuTrigger.addEventListener('click', () => {
        menuContent.classList.toggle('header__menu--scroll-down');
    })
});
