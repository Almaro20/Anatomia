document.addEventListener("DOMContentLoaded", () => {
    const btnCrear = document.querySelector("#btncrear");

    // Cargar las muestras desde la API cuando la página se carga
    const cargarMuestras = async () => {
        try {
            let response = await fetch("http://localhost/Anatomia/public/api/v1/muestras/listar", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json"
                }
            });

            if (!response.ok) {
                throw new Error(`Error al cargar las muestras: ${response.status}`);
            }

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

        muestras.forEach(muestra => {
            agregarMuestraAlDOM(muestra);
        });
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

                <button id="btn-eliminar" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" data-id="${muestra.id}">Eliminar</button>
            </div>`;

            container.appendChild(div);

        // Agregar evento de eliminación al botón
        div.querySelector("#btn-eliminar").addEventListener("click", () => eliminarMuestra(muestra.id, div));
    };

    const eliminarMuestra = async (id, elemento) => {
        try {
            let response = await fetch(`http://localhost/Anatomia/public/api/v1/muestras/eliminar/${id}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json"
                }
            });

            if (!response.ok) {
                throw new Error(`Error al eliminar la muestra: ${response.status}`);
            }

                let data = await response.json();
                alert(data.message);
                elemento.remove(); 
            } catch (error) {
                console.error("Error:", error);
            }
    };

    // Crear muestra desde el modal
    btnCrear.addEventListener("click", async (event) => {
        event.preventDefault(); // Evita el envío por defecto del formulario

        // Obtener los valores del formulario
        const codigo = document.querySelector("#codigo").value;
        const fechaEntrada = document.querySelector("#fecha").value;
        const organo = document.querySelector("#biopsia").value;
        const descripcionMuestra = document.querySelector("#descripcion").value;
        const tipoNaturaleza_id = 1; // Puedes extraerlo del select #naturaleza si la API necesita el ID
        const formato_id = 1; // Lo mismo para #conservacion
        const calidad_id = 1;
        const sede_id = 1;
        const user_id = 1;

        const nuevaMuestra = {
            codigo,
            fechaEntrada,
            organo,
            descripcionMuestra,
            tipoNaturaleza_id,
            formato_id,
            calidad_id,
            sede_id,
            user_id
        };

        try {
            let response = await fetch("http://localhost/Anatomia/public/api/v1/muestras/crear", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(nuevaMuestra)
            });

            if (!response.ok) {
                throw new Error(`Error al crear la muestra: ${response.status}`);
            }

            let muestra = await response.json();
            agregarMuestraAlDOM(muestra);

            // Cerrar el modal después de agregar la muestra
            cerrarModal();
        } catch (error) {
            console.error("Error:", error);
        }
    });

    // Funciones para cargar opciones dinámicamente
    const cargarOpciones = async (url, selectId) => {
        try {
            const response = await fetch(url);

            if (!response.ok) {
                throw new Error(`Error al cargar los datos`);
            }

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
            alert(`Hubo un error al cargar los datos de ${selectId}`);
        }
    };

    cargarOpciones("http://localhost/Anatomia/public/api/v1/tipos-naturaleza", "#naturaleza");
    cargarOpciones("http://localhost/Anatomia/public/api/v1/sedes", "#procedencia");
    cargarOpciones("http://localhost/Anatomia/public/api/v1/calidades", "#conservacion");
    cargarOpciones("http://localhost/Anatomia/public/api/v1/organos", "#biopsia");
});
