document.addEventListener("DOMContentLoaded", () => {
    const btnCrear = document.querySelector("#btncrear");
    let muestraEditando = null; // Variable para saber si estamos editando una muestra

    // Cargar las muestras desde la API cuando la página se carga
    const cargarMuestras = async () => {
        try {
            let response = await fetch("http://localhost/Anatomia/public/api/v1/muestras/listar");
            if (!response.ok) throw new Error(`Error al cargar las muestras: ${response.status}`);

            let muestras = await response.json();
            actualizarMuestrasEnDOM(muestras);
        } catch (error) {
            console.error("Error:", error);
        }
    };

    cargarMuestras();

    const actualizarMuestrasEnDOM = (muestras) => {
        const container = document.querySelector(".container .row");
        container.innerHTML = "";
        muestras.forEach(muestra => agregarMuestraAlDOM(muestra));
    };

    const agregarMuestraAlDOM = (muestra) => {
        const container = document.querySelector(".container .row");
        const div = document.createElement("div");
        div.classList.add("col-md-4", "mt-8");
        div.innerHTML = `
            <div class="border border-dark p-2 rounded-lg shadow-md bg-white">
                <p><strong>Código:</strong> ${muestra.codigo}</p>
                <p><strong>Órgano:</strong> ${muestra.organo}</p>
                <p><strong>Descripción:</strong> ${muestra.descripcionMuestra}</p>
                <button class="btn-eliminar bg-red-600 text-white px-4 py-2 rounded" data-id="${muestra.id}" style="background-color: #dc2626; border-radius: 0.375rem;">Eliminar</button>
                <button class="btn-editar bg-green-600 text-white px-4 py-2 rounded" data-id="${muestra.id}" style="background-color: #16a34a; border-radius: 0.375rem;">Editar</button>
            </div>`;

        container.appendChild(div);

        // Agregar eventos a los botones
        div.querySelector(".btn-eliminar").addEventListener("click", () => eliminarMuestra(muestra.id, div));
        div.querySelector(".btn-editar").addEventListener("click", () => abrirModalEdicion(muestra));
    };

  
    const eliminarMuestra = async (id, elemento) => {
        try {
            let response = await fetch(`http://localhost/Anatomia/public/api/v1/muestras/eliminar/${id}`, { method: "DELETE" });
    
            if (!response.ok) throw new Error(`Error al eliminar la muestra: ${response.status}`);
    
            let data = await response.json();
            
            toastr.error("Muestra eliminada con éxito", "Eliminado", { timeOut: 3000 }); // 🔴 Mensaje en rojo
            elemento.remove();
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al eliminar la muestra", "Error", { timeOut: 3000 });
        }
    };

    // Función para abrir el modal en modo edición
    const abrirModalEdicion = (muestra) => {
        muestraEditando = muestra; // Guardar la muestra en edición
        document.querySelector("#codigo").value = muestra.codigo;
        document.querySelector("#fecha").value = muestra.fechaEntrada;
        document.querySelector("#biopsia").value = muestra.organo;
        document.querySelector("#descripcion").value = muestra.descripcionMuestra;
        document.querySelector("#naturaleza").value = muestra.tipoNaturaleza_id;
        document.querySelector("#conservacion").value = muestra.formato_id;
        document.querySelector("#procedencia").value = muestra.sede_id;

        document.getElementById("modalInforme").classList.remove("hidden");
        btnCrear.innerText = "Actualizar Informe"; // Cambia el texto del botón
    };

    // Función para crear o editar la muestra
    btnCrear.addEventListener("click", async (event) => {
        event.preventDefault();

        const nuevaMuestra = {
            codigo: document.querySelector("#codigo").value,
            fechaEntrada: document.querySelector("#fecha").value,
            organo: document.querySelector("#biopsia").value,
            descripcionMuestra: document.querySelector("#descripcion").value,
            tipoNaturaleza_id: document.querySelector("#naturaleza").value,
            formato_id: document.querySelector("#conservacion").value,
            calidad_id: 1,
            sede_id: document.querySelector("#procedencia").value,
            user_id: 1
        };

        try {
            let response, mensaje;
            if (muestraEditando) {
                // EDITAR MUESTRA
                response = await fetch(`http://localhost/Anatomia/public/api/v1/muestras/editar/${muestraEditando.id}`, {
                    method: "PUT",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(nuevaMuestra)
                });
                mensaje = "Muestra actualizada con éxito";
            } else {
                // CREAR MUESTRA
                response = await fetch("http://localhost/Anatomia/public/api/v1/muestras/crear", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(nuevaMuestra)
                });
                mensaje = "Muestra creada con éxito";
            }

            if (!response.ok) throw new Error(`Error en la operación: ${response.status}`);
            toastr.success(mensaje);
            //alert(mensaje);
            cerrarModal();
            cargarMuestras(); // Recargar la lista
        } catch (error) {
            console.error("Error:", error);
        }
    });

    function cerrarModal() {
        document.getElementById('modalInforme').classList.add('hidden');
        muestraEditando = null;
        btnCrear.innerText = "Guardar Informe"; // Restaurar el botón al modo "Crear"
    }

    // Mantener la carga de opciones dinámicas como estaba
    const cargarOpciones = async (url, selectId) => {
        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error('Error al cargar los datos');

            const datos = await response.json();
            const select = document.querySelector(selectId);
            select.innerHTML = ""; // Limpiar opciones previas

            datos.forEach(tipo => {
                const option = document.createElement('option');
                option.value = tipo.id;
                option.textContent = tipo.nombre || tipo.descripcion;
                select.appendChild(option);
            });
        } catch (error) {
            alert("Hubo un error al cargar los datos de " + selectId);
        }
    };

    cargarOpciones("http://localhost/Anatomia/public/api/v1/tipos-naturaleza", "#naturaleza");
    cargarOpciones("http://localhost/Anatomia/public/api/v1/sedes", "#procedencia");
    cargarOpciones("http://localhost/Anatomia/public/api/v1/calidades", "#conservacion");
    cargarOpciones("http://localhost/Anatomia/public/api/v1/organos", "#biopsia");
});











// document.addEventListener("DOMContentLoaded", () => { // Espera a que el DOM esté completamente cargado
//     const btnCrear = document.querySelector("#btncrear"); // Selecciona el botón de crear/actualizar informe
//     let muestraEditando = null; // Variable para almacenar la muestra que se está editando

//     const cargarMuestras = async () => { // Función asíncrona para obtener las muestras de la API
//         try {
//             let response = await fetch("http://localhost/Anatomia/public/api/v1/muestras/listar"); // Realiza la solicitud GET a la API
//             if (!response.ok) throw new Error(`Error al cargar las muestras: ${response.status}`); // Manejo de errores si la respuesta no es exitosa

//             let muestras = await response.json(); // Convierte la respuesta en JSON
//             actualizarMuestrasEnDOM(muestras); // Llama a la función para mostrar las muestras en el DOM
//         } catch (error) {
//             console.error("Error:", error); // Muestra el error en la consola
//         }
//     };

//     cargarMuestras(); // Llama a la función para cargar muestras al inicio

//     const actualizarMuestrasEnDOM = (muestras) => { // Función para actualizar las muestras en el DOM
//         const container = document.querySelector(".container .row"); // Selecciona el contenedor donde se mostrarán las muestras
//         container.innerHTML = ""; // Limpia el contenido antes de agregar nuevas muestras
//         muestras.forEach(muestra => agregarMuestraAlDOM(muestra)); // Itera sobre cada muestra y la agrega al DOM
//     };

//     const agregarMuestraAlDOM = (muestra) => { // Función para agregar una muestra específica al DOM
//         const container = document.querySelector(".container .row"); // Selecciona el contenedor
//         const div = document.createElement("div"); // Crea un nuevo div
//         div.classList.add("col-md-4", "mt-8"); // Agrega clases CSS para el diseño
//         div.innerHTML = `
//             <div class="border border-dark p-2 rounded-lg shadow-md bg-white"> // Estructura del div de la muestra
//                 <p><strong>Código:</strong> ${muestra.codigo}</p> // Muestra el código de la muestra
//                 <p><strong>Órgano:</strong> ${muestra.organo}</p> // Muestra el órgano de la muestra
//                 <p><strong>Descripción:</strong> ${muestra.descripcionMuestra}</p> // Muestra la descripción de la muestra
//                 <button class="btn-eliminar bg-red-600 text-white px-4 py-2 rounded" data-id="${muestra.id}">Eliminar</button> // Botón para eliminar
//                 <button class="btn-editar bg-green-600 text-white px-4 py-2 rounded" data-id="${muestra.id}">Editar</button> // Botón para editar
//             </div>`;
        
//         container.appendChild(div); // Agrega el div al contenedor

//         div.querySelector(".btn-eliminar").addEventListener("click", () => eliminarMuestra(muestra.id, div)); // Asigna evento para eliminar
//         div.querySelector(".btn-editar").addEventListener("click", () => abrirModalEdicion(muestra)); // Asigna evento para editar
//     };

//     const eliminarMuestra = async (id, elemento) => { // Función para eliminar una muestra
//         try {
//             let response = await fetch(`http://localhost/Anatomia/public/api/v1/muestras/eliminar/${id}`, 
//             { method: "DELETE" }); // Solicitud DELETE a la API

//             if (!response.ok) throw new Error(`Error al eliminar la muestra: ${response.status}`); // Manejo de errores
//             let data = await response.json(); // Convierte respuesta en JSON
//             alert(data.message); // Muestra mensaje de éxito
//             elemento.remove(); // Elimina el elemento del DOM
//         } catch (error) {
//             console.error("Error:", error); // Muestra el error en consola
//         }
//     };

//     const abrirModalEdicion = (muestra) => { // Función para abrir el modal de edición
//         muestraEditando = muestra; // Guarda la muestra en edición
//         document.querySelector("#codigo").value = muestra.codigo; // Llena el campo de código con la muestra existente
//         document.querySelector("#fecha").value = muestra.fechaEntrada; // Llena el campo de fecha
//         document.querySelector("#biopsia").value = muestra.organo; // Llena el campo de órgano
//         document.querySelector("#descripcion").value = muestra.descripcionMuestra; // Llena el campo de descripción
//         document.querySelector("#naturaleza").value = muestra.tipoNaturaleza_id; // Llena el campo de naturaleza
//         document.querySelector("#conservacion").value = muestra.formato_id; // Llena el campo de conservación
//         document.querySelector("#procedencia").value = muestra.sede_id; // Llena el campo de procedencia

//         document.getElementById("modalInforme").classList.remove("hidden"); // Muestra el modal
//         btnCrear.innerText = "Actualizar Informe"; // Cambia el texto del botón a "Actualizar"
//     };

//     btnCrear.addEventListener("click", async (event) => { // Evento para crear o actualizar muestra
//         event.preventDefault(); // Evita la recarga de la página
//         const nuevaMuestra = { // Crea objeto con datos del formulario
//             codigo: document.querySelector("#codigo").value,
//             fechaEntrada: document.querySelector("#fecha").value,
//             organo: document.querySelector("#biopsia").value,
//             descripcionMuestra: document.querySelector("#descripcion").value,
//             tipoNaturaleza_id: document.querySelector("#naturaleza").value,
//             formato_id: document.querySelector("#conservacion").value,
//             calidad_id: 1,
//             sede_id: document.querySelector("#procedencia").value,
//             user_id: 1
//         };

//         try {
//             let response, mensaje;
//             if (muestraEditando) { // Si se está editando, hacer PUT
//                 response = await fetch(`http://localhost/Anatomia/public/api/v1/muestras/editar/${muestraEditando.id}`, {
//                     method: "PUT",
//                     headers: { "Content-Type": "application/json" },
//                     body: JSON.stringify(nuevaMuestra)
//                 });
//                 mensaje = "Muestra actualizada con éxito";
//             } else { // Si no, hacer POST
//                 response = await fetch("http://localhost/Anatomia/public/api/v1/muestras/crear", {
//                     method: "POST",
//                     headers: { "Content-Type": "application/json" },
//                     body: JSON.stringify(nuevaMuestra)
//                 });
//                 mensaje = "Muestra creada con éxito";
//             }

//             if (!response.ok) throw new Error(`Error en la operación: ${response.status}`);
//             toastr.success(mensaje);
//             // alert(mensaje);
//             cerrarModal(); // Cierra el modal
//             cargarMuestras(); // Recargar lista de muestras
//         } catch (error) {
//             console.error("Error:", error);
//         }
//     });

//     function cerrarModal() { // Función para cerrar el modal y resetear valores
//         document.getElementById('modalInforme').classList.add('hidden');
//         muestraEditando = null;
//         btnCrear.innerText = "Guardar Informe";
//     }
// });

