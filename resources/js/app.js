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



/** Sweet Alert 2*/
import Swal from "sweetalert2";
window.Swal = Swal

// Sweet Alert 2 
document.getElementById('btnDelete').addEventListener('click', () => {
    window.dispatchEvent(new CustomEvent('swal:toast', {
        detail: {
          title:'Hello world',
          text: 'Message from vanilla js',
          icon: 'success',
          background: 'success',
        }
    }));
});
   


 

