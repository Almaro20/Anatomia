// document.addEventListener('DOMContentLoaded', function () {
//     // Selección de elementos
//     const selectNaturaleza = document.getElementById('naturaleza');
//     const uploadForm = document.getElementById('uploadForm');
//     const fileInput = document.getElementById('archivo_foto');

//     // Función para cargar los datos desde la API
//     async function cargarNaturaleza() {
//         try {
//             const response = await fetch('/api/tipo-naturaleza');
//             if (!response.ok) {
//                 throw new Error(`Error al cargar los datos: ${response.statusText}`);
//             }
//             const datos = await response.json();

//             datos.forEach(tipo => {
//                 const option = document.createElement('option');
//                 option.value = tipo.tipoNaturaleza_id;
//                 option.textContent = tipo.nombre;
//                 selectNaturaleza.appendChild(option);
//             });
//         } catch (error) {
//             console.error('Error al cargar los tipos de naturaleza:', error);
//             alert('Hubo un error al cargar los tipos de naturaleza. Intenta nuevamente.');
//         }
//     }

//     // Validación del formulario de carga
//     if (uploadForm && fileInput) {
//         uploadForm.addEventListener('submit', function (e) {
//             const files = fileInput.files;
//             if (files.length < 1 || files.length > 6) {
//                 e.preventDefault();
//                 alert('Por favor, selecciona entre 1 y 6 archivos.');
//             }
//         });
//     }

//     // Llamar a la función para cargar los datos
//     cargarNaturaleza();
// });
