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
            alert(data.message);
            elemento.remove();
        } catch (error) {
            console.error("Error:", error);
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

            alert(mensaje);
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