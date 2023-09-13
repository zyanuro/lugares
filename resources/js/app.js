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



/** SweetAlert 2 **/
import Swal from "sweetalert2";
window.Swal = Swal


// Selecciona todos los botones con la clase "btnDelete"
const btnDeleteElements = document.querySelectorAll('.btnDelete');

// Agrega un controlador de eventos de clic a cada botón
btnDeleteElements.forEach(function (element) {
  element.addEventListener('click', function (event) {
    // Detiene el comportamiento predeterminado del botón
    event.preventDefault();
    event.stopPropagation();

    // Muestra la primera confirmación SweetAlert2 antes de eliminar el elemento
    Swal.fire({
      title: '¿Are yo sure?',
      text: 'You wont be able to reverse this',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it',
      cancelButtonText: 'Cancel',
      showLoaderOnConfirm: true, // Muestra un indicador de carga
      preConfirm: () => {
        return new Promise((resolve) => {
          Swal.showLoading(); // Muestra un indicador de carga antes de mostrar la segunda ventana modal
          setTimeout(() => {
            resolve();
          }, 1000); // Espera 1 segundo antes de resolver la promesa (puedes ajustar el tiempo)
        });
      }
    }).then((result) => {
      // Manejar la confirmación
      if (result.isConfirmed) {
        // Muestra la segunda ventana modal
        Swal.fire({
          title: 'Deleted',
          text: 'The placed has been deleted',
          icon: 'success',
          showCancelButton: false,
          confirmButtonText: 'OK',
        }).then(() => {
          // En este punto, la segunda ventana modal se ha mostrado
          // Puedes enviar el formulario de eliminación aquí
          const form = element.closest('form'); // Encuentra el formulario más cercano al botón
          if (form) {
            form.submit(); // Envía el formulario
          } else {
            console.error('No se pudo encontrar el formulario asociado al botón');
          }
        });
      }
    });
  });
});

// Maps burtton
let btnMap = document.getElementById('btnMap');
let map_content = document.getElementById('map_content');

btnMap.addEventListener('click', () => {
    map_content.classList.toggle("hidden");
});



//document.delete.submit()    