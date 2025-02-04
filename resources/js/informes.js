console.log("El archivo informes.js se ha cargado correctamente");

document.addEventListener("DOMContentLoaded", async function() {
    console.log("Intentando cargar las sedes...");
    const selectProcedencia = document.getElementById("procedencia");

    try {
        const response = await fetch('/Anatomia/public/sedes'); // URL corregida
        console.log("Respuesta recibida:", response);

        const data = await response.json();
        console.log("Datos recibidos:", data); // Verifica si se reciben datos

        data.forEach(sede => {
            let option = document.createElement("option");
            option.value = sede.sede_id; // ID de la sede
            option.textContent = sede.nombre; // Nombre de la sede
            selectProcedencia.appendChild(option);
        });

        console.log("Opciones añadidas al select");

    } catch (error) {
        console.error("Error cargando las sedes:", error);
    }
});



// botonSiguiente = document.querySelector('#vistainforme');

// botonSiguiente.addEventListener('click', async () => {

//     // Capturar los datos del formulario
//     const datos = {
//         codigo: document.getElementById('codigo').value,
//         fecha: document.getElementById('fecha').value,
//         naturaleza: document.getElementById('naturaleza').value,
//         biopsia: document.getElementById('biopsia').value,
//         conservacion: document.getElementById('conservacion').value,
//         procedencia: document.getElementById('procedencia').value
//     };

//     try {
//         const respuesta = await fetch('/', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: JSON.stringify(datos)
//         });

//         const resultado = await respuesta.json();
//         if (resultado.success) {
//             alert('Informe guardado correctamente');
//         } else {
//             alert('Hubo un error al guardar el informe');
//         }
//     } catch (error) {
//         console.error('Error:', error);
//         alert('Error en la conexión con el servidor');
//     }
// });
