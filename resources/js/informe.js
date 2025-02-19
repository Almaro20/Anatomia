document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = "/informe";


    const btnCrear = document.querySelector("#btncrear");
    let muestraEditando = null;

    // Cargar las muestras desde la API cuando la página se carga
    const cargarMuestras = async () => {
        try {
            let response = await fetch(`${BASE_URL}api/v2/muestras/listar`);
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

    async function obtenerNombreOrgano(codigoOrgano) {
        try {
            const respuesta = await fetch(`${BASE_URL}api/v1/organo/${codigoOrgano}`);
            if (!respuesta.ok) {
                throw new Error("Órgano no encontrado");
            }
            const data = await respuesta.json();
            return data.nombre;
        } catch (error) {
            console.error("Error obteniendo el órgano:", error);
            return "Desconocido";
        }
    }

    const agregarMuestraAlDOM = async (muestra) => {
        const nombreOrgano = await obtenerNombreOrgano(muestra.organo); // Obtener el nombre del órgano
        const container = document.querySelector(".container .row");
        const div = document.createElement("div");
        div.classList.add("col-md-4", "mt-8");
        div.innerHTML = `
            <div class="border border-dark p-2 rounded-lg shadow-md bg-white">
                <p><strong>Código:</strong> ${muestra.codigo}</p>
                <p><strong>Órgano:</strong> ${nombreOrgano}</p>
                <p><strong>Descripción:</strong> ${muestra.descripcionMuestra}</p>
                <button class="btn-eliminar bg-red-600 text-white px-4 py-2 rounded" data-id="${muestra.id}" style="background-color: #dc2626; border-radius: 0.375rem;">Eliminar</button>
                <button class="btn-editar bg-green-600 text-white px-4 py-2 rounded" data-id="${muestra.id}" style="background-color: #16a34a; border-radius: 0.375rem;">Editar</button>
                <!-- Botón de Imprimir agregado -->
                <button class="btn-imprimir bg-blue-600 text-white px-4 py-2 rounded" style="background-color: #1e40af; border-radius: 0.375rem;" data-id="${muestra.id}" onclick="imprimirMuestra(this)">Imprimir</button>
            </div>`;
        container.appendChild(div);

        // Agregar eventos a los botones
        div.querySelector(".btn-eliminar").addEventListener("click", () => eliminarMuestra(muestra.id, div));
        div.querySelector(".btn-editar").addEventListener("click", () => abrirModalEdicion(muestra));
    };

    const eliminarMuestra = async (id, elemento) => {
        try {
            let response = await fetch(`${BASE_URL}api/v2/muestras/eliminar/${id}`, { method: "DELETE" });

            if (!response.ok) throw new Error(`Error al eliminar la muestra: ${response.status}`);

            toastr.error("Muestra eliminada con éxito", "Eliminado", { timeOut: 3000 });
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
        btnCrear.innerText = "Actualizar Informe";
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
                response = await fetch(`${BASE_URL}api/v2/muestras/editar/${muestraEditando.id}`, {
                    method: "PUT",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(nuevaMuestra)
                });
                mensaje = "Muestra actualizada con éxito";
            } else {
                response = await fetch(`${BASE_URL}api/v2/muestras/crear`, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(nuevaMuestra)
                });
                mensaje = "Muestra creada con éxito";
            }

            if (!response.ok) throw new Error(`Error en la operación: ${response.status}`);
            toastr.success(mensaje);
            cerrarModal();
            cargarMuestras(); // Recargar la lista
        } catch (error) {
            console.error("Error:", error);
        }
    });

    function cerrarModal() {
        document.getElementById('modalInforme').classList.add('hidden');
        muestraEditando = null;
        btnCrear.innerText = "Guardar Informe";
    }

    window.imprimirMuestra = function(event) {
        const muestraId = event.getAttribute('data-id');

        // Redirigir al endpoint que genera el PDF
        const url = `${BASE_URL}imprimir/muestra/${muestraId}`;

        // Realizar la solicitud para descargar el PDF
        window.open(url, '_blank');
    };

    const cargarOpciones = async (endpoint, selectId) => {
        try {
            const response = await fetch(`${BASE_URL}${endpoint}`);
            if (!response.ok) throw new Error('Error al cargar los datos');

            const datos = await response.json();
            const select = document.querySelector(selectId);
            select.innerHTML = "";

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

    cargarOpciones("api/v1/tipos-naturaleza", "#naturaleza");
    cargarOpciones("api/v1/sedes", "#procedencia");
    cargarOpciones("api/v1/calidades", "#conservacion");
    cargarOpciones("api/v1/organos", "#biopsia");
});
