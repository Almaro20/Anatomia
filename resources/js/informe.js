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

    // Llamamos a la función para cargar las muestras cuando la página se carga
    cargarMuestras();

    // Función para actualizar las muestras en el DOM
    const actualizarMuestrasEnDOM = (muestras) => {
        const container = document.querySelector(".container .row");
        container.innerHTML = ""; // Limpiar las muestras previas

        muestras.forEach(muestra => {
            agregarMuestraAlDOM(muestra);
        });
    };

    // Función para agregar una muestra individual al DOM
    const agregarMuestraAlDOM = (muestra) => {
        const container = document.querySelector(".container .row");

        const div = document.createElement("div");
        div.classList.add("col-md-4", "mt-8");
        div.innerHTML = `
            <div class="border border-dark p-2 rounded-lg shadow-md bg-white">
                <p><strong>Código:</strong> ${muestra.codigo}</p>
                <p><strong>Órgano:</strong> ${muestra.organo}</p>
                <p><strong>Descripción:</strong> ${muestra.descripcionMuestra}</p>
            </div>
        `;
        container.appendChild(div);
    };

    // Evento para crear una nueva muestra cuando se hace click en el botón
    btnCrear.addEventListener("click", async () => {
        const nuevaMuestra = {
            codigo: "M003",
            fechaEntrada: "2024-02-06",
            organo: "B", 
            descripcionMuestra: "Descripción de la muestra",
            tipoNaturaleza_id: 1,
            formato_id: 1,
            calidad_id: 1,
            sede_id: 1,
            user_id: 1
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
            agregarMuestraAlDOM(muestra); // Solo agrega la nueva muestra sin recargar todas

        } catch (error) {
            console.error("Error:", error);
        }
    });
});
