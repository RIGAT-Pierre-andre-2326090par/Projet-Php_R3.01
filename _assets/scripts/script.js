window.onload = function() {
    const boutonMenu = document.getElementById('boutonmenu');
    const menu = document.querySelector('.menu');

    boutonMenu.addEventListener('click', function() {
        menu.classList.toggle('menu_opened');
    });
};