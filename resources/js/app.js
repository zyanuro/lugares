import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Burger menu
let button = document.getElementById('nav-button');
let menu = document.getElementById('nav-menu');

button.addEventListener('click', () => {
    menu.classList.toggle("hidden");
});

		
 

