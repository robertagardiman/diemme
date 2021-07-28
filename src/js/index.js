import "@babel/polyfill";


document.addEventListener('DOMContentLoaded', () => {
    const menuTrigger = document.querySelector('.header__menu-trigger');
    const menuContent = document.querySelector('.header__menu-content');
    menuTrigger.addEventListener('click', () => {
        menuContent.classList.toggle('header__menu--scroll-down');
    })

    const progettiOverlayTrigger = document.querySelector('.work__item--progetti');
    const progettiOverlay = document.querySelector('.progetti-overlay');
    const progettiOverlayClose = document.querySelector('.progetti-overlay__close');

    const primaedopoOverlayTrigger = document.querySelector('.work__item--primaedopo');
    const primaedopoOverlay = document.querySelector('.primaedopo-overlay');
    const primaedopoOverlayClose = document.querySelector('.primaedopo-overlay__close');

    if (progettiOverlayTrigger) {
        progettiOverlayTrigger.addEventListener('click', () => {
            addClass(progettiOverlay);
        })
    }

    if(progettiOverlayClose) {
        progettiOverlayClose.addEventListener('click', () => {
            removeClass(progettiOverlay);
        })
    }

    if (primaedopoOverlayTrigger) {
        primaedopoOverlayTrigger.addEventListener('click', () => {
            addClass(primaedopoOverlay);
        })
    }

    if (primaedopoOverlayClose) {
        primaedopoOverlayClose.addEventListener('click', () => {
            removeClass(primaedopoOverlay);
        })
    }
});

function addClass(element) {
    element.classList.add('show');
}

function removeClass(element) {
    element.classList.remove('show');
}
