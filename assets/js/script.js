// MENU
let menuOpener = document.querySelector('.menu-opener');
let nav = document.querySelector('header nav');

menuOpener.addEventListener('click', () => {
    if (nav.classList.contains('opened')) {
        nav.classList.remove('opened');
        menuOpener.querySelector('.close-icon').style.display = 'none';
        menuOpener.querySelector('.hamburger-icon').style.display = 'flex';
    } else {
        nav.classList.add('opened');
        menuOpener.querySelector('.close-icon').style.display = 'flex';
        menuOpener.querySelector('.hamburger-icon').style.display = 'none';
    }
});

// DROPDOWM
document.addEventListener('DOMContentLoaded', function() {
    var dropdown = document.querySelector('.arrow-dowm');
    var dropdownMenu = document.querySelector('.dropdown-menu');

    dropdown.addEventListener('click', function(event) {
        event.preventDefault();

        if (dropdownMenu.style.display === 'block') {
            dropdownMenu.style.display = 'none';
        } else {
            dropdownMenu.style.display = 'block';
        }
    });
});