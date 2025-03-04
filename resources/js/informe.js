document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = "http://localhost:8080/public/";
    const btnCrear = document.querySelector("#btncrear");
    let muestraEditando = null;
    let muestrasCreadas = new Set();

    // Función para cargar las muestras existentes
    const cargarMuestras = async () => {
        try {
            const response = await fetch(`${BASE_URL}api/v2/muestras/listar`);
            if (!response.ok) throw new Error(`Error: ${response.status}`);

            const muestras = await response.json();
            const container = document.querySelector(".container .row");
            container.innerHTML = "";

            // Reiniciamos el Set para que se vuelvan a listar todas las muestras
            muestrasCreadas.clear();

            for (const muestra of muestras) {
                if (!muestrasCreadas.has(muestra.codigo)) {
                    muestrasCreadas.add(muestra.codigo);
                    await agregarMuestraAlDOM(muestra);
                }
            }
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar las muestras");
        }
    };


    // Función para agregar una muestra al DOM
    const agregarMuestraAlDOM = async (muestra) => {
        try {
            const nombreOrgano = await obtenerNombreOrgano(muestra.organo);
            const div = document.createElement("div");
            div.classList.add("col-md-4", "mt-8");
            div.innerHTML = `
                <div class="border border-dark p-2 rounded-lg shadow-md bg-white">
                    <p><strong>Código:</strong> ${muestra.codigo}</p>
                    <p><strong>Formato:</strong> ${nombreOrgano}</p>
                    <p><strong>Descripción:</strong> ${muestra.descripcionMuestra}</p>
                    <div class="flex gap-2 mt-2">
                        <button class="btn-eliminar bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" data-id="${muestra.id}">Eliminar</button>
                        <button class="btn-editar bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700" data-id="${muestra.id}">Editar</button>
                        <button 
                            class="btn-imprimir bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                            data-id="${muestra.id}"
                        >
                            Imprimir
                        </button>
                        </div>
                </div>`;

            const container = document.querySelector(".container .row");
            container.appendChild(div);

            // Event listeners para los botones
            div.querySelector(".btn-eliminar").addEventListener("click", () => eliminarMuestra(muestra.id, div));
            div.querySelector(".btn-editar").addEventListener("click", () => abrirModalEdicion(muestra));
            div.querySelector(".btn-imprimir").addEventListener("click", () => imprimirMuestra(muestra.id));
        } catch (error) {
            console.error("Error al agregar muestra al DOM:", error);
        }
    };

    // Función para obtener el nombre del órgano
    const obtenerNombreOrgano = async (codigoOrgano) => {
        try {
            const response = await fetch(`${BASE_URL}api/v1/organo/${codigoOrgano}`);
            if (!response.ok) throw new Error("Órgano no encontrado");
            const data = await response.json();
            return data.nombre;
        } catch (error) {
            console.error("Error obteniendo el órgano:", error);
            return "Desconocido";
        }
    };

    // Función para eliminar una muestra
    const eliminarMuestra = async (id, elemento) => {
        try {
            const response = await fetch(`${BASE_URL}api/v2/muestras/eliminar/${id}`, {
                method: "DELETE"
            });

            if (!response.ok) throw new Error(`Error al eliminar la muestra: ${response.status}`);

            toastr.success("Muestra eliminada con éxito");
            elemento.remove();
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al eliminar la muestra");
        }
    };

    // Función para abrir el modal de edición
    const abrirModalEdicion = async (muestra) => {
        muestraEditando = muestra;

        // Llenar los campos del formulario
        document.querySelector("#codigo").value = muestra.codigo;
        document.querySelector("#fecha").value = muestra.fechaEntrada;
        document.querySelector("#descripcion").value = muestra.descripcionMuestra;

        // 1. Cargar tipos de estudio y setear el valor
        await cargarTiposEstudio();
        document.querySelector("#tipoEstudio").value = muestra.tipoEstudio_id;

        // 2. Cargar naturalezas y setear el valor
        await cargarTiposNaturaleza(muestra.tipoEstudio_id);
        document.querySelector("#naturaleza").value = muestra.tipoNaturaleza_id;

        // 3. Dependiendo de si es biopsia o no, cargar calidades
        if (esBiopsia(muestra.tipoEstudio_id)) {
            // Para biopsia: cargar órganos y luego calidades según el órgano
            await cargarOrganos();
            document.querySelector("#biopsia").value = muestra.organo;
            await cargarCalidadesPorOrgano(muestra.organo);
        } else {
            // Para no-biopsia: usar el código del tipo de estudio
            const selectedTipo = document.querySelector(`#tipoEstudio option[value="${muestra.tipoEstudio_id}"]`);
            const codigoEstudio = selectedTipo ? selectedTipo.getAttribute('data-codigo') : '';
            if (codigoEstudio) {
                await cargarCalidadesPorTipoEstudio(codigoEstudio);
            }
        }

        // 4. Rellenar el resto de selects
        document.querySelector("#calidad").value = muestra.calidad_id;
        document.querySelector("#conservacion").value = muestra.formato_id;
        document.querySelector("#procedencia").value = muestra.sede_id;

        // Mostrar el modal y cambiar el texto del botón
        document.getElementById("modalInforme").classList.remove("hidden");
        btnCrear.innerText = "Actualizar Informe";
    };

    // Función para cargar los tipos de estudio (ahora asignamos data-codigo)
    const cargarTiposEstudio = async () => {
        try {
            const response = await fetch(`${BASE_URL}api/v1/tipos-estudio`);
            if (!response.ok) throw new Error('Error al cargar tipos de estudio');

            const tiposEstudio = await response.json();
            const select = document.querySelector("#tipoEstudio");
            select.innerHTML = '<option value="">Seleccione un tipo de estudio</option>';

            tiposEstudio.forEach(tipo => {
                const option = document.createElement('option');
                option.value = tipo.id;
                option.textContent = tipo.nombre;
                // IMPORTANTE: asignar data-codigo (por ejemplo, 'C', 'H', 'U', 'E', 'B')
                if (tipo.codigo) {
                    option.setAttribute('data-codigo', tipo.codigo);
                } else {
                    // Biopsia o cualquier otro sin código
                    option.setAttribute('data-codigo', '');
                }
                select.appendChild(option);
            });
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar tipos de estudio");
        }
    };

    // Función para cargar tipos de naturaleza basados en el tipo de estudio
    const cargarTiposNaturaleza = async (tipoEstudioId) => {
        try {
            const response = await fetch(`${BASE_URL}api/tipos-naturaleza/${tipoEstudioId}`);
            if (!response.ok) throw new Error('Error al cargar tipos de naturaleza');

            const tiposNaturaleza = await response.json();
            const select = document.querySelector("#naturaleza");
            select.innerHTML = '<option value="">Seleccione naturaleza</option>';

            tiposNaturaleza.forEach(tipo => {
                const option = document.createElement('option');
                option.value = tipo.id;
                option.textContent = tipo.nombre;
                // Si la naturaleza también maneja un "codigo", lo asignas aquí
                if (tipo.codigo) {
                    option.setAttribute('data-naturaleza', tipo.codigo);
                }
                select.appendChild(option);
            });

            select.disabled = false;
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar tipos de naturaleza");
        }
    };

    // Función para cargar órganos (solo para biopsia)
    const cargarOrganos = async () => {
        try {
            const response = await fetch(`${BASE_URL}api/v1/organos`);
            if (!response.ok) throw new Error('Error al cargar órganos');

            const organos = await response.json();
            const select = document.querySelector("#biopsia");
            select.innerHTML = '<option value="">Seleccione órgano</option>';

            organos.forEach(organo => {
                const option = document.createElement('option');
                option.value = organo.id;
                option.textContent = organo.nombre;
                // El 'data-codigo' del órgano (para calidades de biopsia)
                option.setAttribute('data-codigo', organo.codigo || '');
                select.appendChild(option);
            });

            select.disabled = false;
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar órganos");
        }
    };

    // Función para cargar calidades cuando NO es biopsia (usa el código del tipo de estudio)
    const cargarCalidadesPorTipoEstudio = async (codigoEstudio) => {
        const select = document.querySelector("#calidad");
        select.innerHTML = '<option value="">Seleccione calidad</option>';
        select.disabled = true;
        if (!codigoEstudio) {
            // Si el tipo de estudio no tiene código, no cargamos nada
            return;
        }

        try {
            const response = await fetch(`${BASE_URL}api/v4/calidades/${codigoEstudio}`);
            if (!response.ok) throw new Error(`Error en la petición: ${response.status}`);

            const data = await response.json();
            if (!Array.isArray(data) || data.length === 0) {
                toastr.warning("No hay calidades disponibles para este estudio");
                return;
            }
            data.forEach(calidad => {
                const option = document.createElement('option');
                option.value = calidad.id;
                option.textContent = calidad.descripcion;
                select.appendChild(option);
            });
            select.disabled = false;
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar calidades");
        }
    };

    // Función para cargar calidades según el órgano (para biopsias)
    const cargarCalidadesPorOrgano = async (organoId) => {
        try {
            const selectBiopsia = document.querySelector("#biopsia");
            const opcionSeleccionada = selectBiopsia.options[selectBiopsia.selectedIndex];
            const codigoOrgano = opcionSeleccionada.getAttribute("data-codigo");

            if (!codigoOrgano) {
                throw new Error("No se encontró el código del órgano seleccionado");
            }

            const response = await fetch(`${BASE_URL}api/v4/calidades/${codigoOrgano}`);
            if (!response.ok) throw new Error('Error al cargar calidades por órgano');

            const calidades = await response.json();
            const select = document.querySelector("#calidad");
            select.innerHTML = '<option value="">Seleccione calidad</option>';

            calidades.forEach(calidad => {
                const option = document.createElement('option');
                option.value = calidad.id;
                option.textContent = calidad.descripcion;
                select.appendChild(option);
            });

            select.disabled = false;
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar calidades por órgano");
        }
    };

    // Event Listeners para los selects
    document.querySelector("#tipoEstudio").addEventListener('change', function() {
        const tipoEstudioId = this.value;
        const biopsiaSelect = document.querySelector("#biopsia");
        const naturalezaSelect = document.querySelector("#naturaleza");
        const calidadSelect = document.querySelector("#calidad");

        // Resetear selects
        naturalezaSelect.innerHTML = '<option value="">Seleccione naturaleza</option>';
        biopsiaSelect.innerHTML = '<option value="">Seleccione órgano</option>';
        calidadSelect.innerHTML = '<option value="">Seleccione calidad</option>';

        naturalezaSelect.disabled = true;
        biopsiaSelect.disabled = true;
        calidadSelect.disabled = true;

        if (tipoEstudioId) {
            // Cargar las naturalezas
            cargarTiposNaturaleza(tipoEstudioId);

            if (esBiopsia(tipoEstudioId)) {
                // Si es biopsia, cargamos órganos
                cargarOrganos();
            } else {
                // Si NO es biopsia, tomamos el 'data-codigo' del tipo de estudio
                const selectedTipo = this.options[this.selectedIndex];
                const codigoEstudio = selectedTipo.getAttribute('data-codigo');
                // Cargamos las calidades basadas en ese código
                if (codigoEstudio) {
                    cargarCalidadesPorTipoEstudio(codigoEstudio);
                }
            }
        }
    });

    // Si el usuario cambia la naturaleza (para no-biopsia, puedes decidir si quieres recalcular o no)
    document.querySelector("#naturaleza").addEventListener('change', function() {
        // Solo si quieres que la naturaleza también influya, lo harías aquí.
        // De lo contrario, para no-biopsia, ya tenemos las calidades por el código del tipo de estudio.
    });

    // Cuando cambia el órgano (para biopsias)
    document.querySelector("#biopsia").addEventListener('change', function() {
        const organoId = this.value;
        const calidadSelect = document.querySelector("#calidad");

        calidadSelect.innerHTML = '<option value="">Seleccione calidad</option>';
        calidadSelect.disabled = true;

        if (organoId) {
            cargarCalidadesPorOrgano(organoId);
        }
    });

    // Función para verificar si es una biopsia
    const esBiopsia = (tipoEstudioId) => {
        const option = document.querySelector(`#tipoEstudio option[value="${tipoEstudioId}"]`);
        return option ? option.text.toLowerCase().includes('biopsia') : false;
    };

    // Función para crear/actualizar una muestra
    document.getElementById('btncrear').addEventListener('click', async function(event) {
        event.preventDefault();

        const formData = {
            codigo: document.querySelector("#codigo").value,
            fechaEntrada: document.querySelector("#fecha").value,
            organo: document.querySelector("#biopsia").value,
            descripcionMuestra: document.querySelector("#descripcion").value,
            tipoEstudio_id: document.querySelector("#tipoEstudio").value,
            tipoNaturaleza_id: document.querySelector("#naturaleza").value,
            formato_id: document.querySelector("#conservacion").value,
            calidad_id: document.querySelector("#calidad").value,
            sede_id: document.querySelector("#procedencia").value,
            user_id: 1 // Ajusta al usuario actual
        };

        // Validaciones mínimas
        if (!formData.codigo || !formData.tipoEstudio_id || !formData.tipoNaturaleza_id) {
            toastr.error("Por favor complete todos los campos requeridos");
            return;
        }

        if (esBiopsia(formData.tipoEstudio_id) && !formData.organo) {
            toastr.error("Por favor seleccione un órgano para la biopsia");
            return;
        }

        try {
            const url = muestraEditando
                ? `${BASE_URL}api/v2/muestras/editar/${muestraEditando.id}`
                : `${BASE_URL}api/v2/muestras/crear`;

            const response = await fetch(url, {
                method: muestraEditando ? 'PUT' : 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            });

            if (!response.ok) throw new Error(`Error: ${response.status}`);

            toastr.success(muestraEditando ? "Muestra actualizada con éxito" : "Muestra creada con éxito");

            if (!muestraEditando) {
                muestrasCreadas.add(formData.codigo);
            }

            cerrarModal();
            cargarMuestras();
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al guardar la muestra");
        }
    });

    // Función para cerrar el modal y limpiar el formulario
    window.cerrarModal = () => {
        document.getElementById('modalInforme').classList.add('hidden');
        muestraEditando = null;
        btnCrear.innerText = "Guardar Informe";

        // Limpiar campos
        document.querySelector("#codigo").value = "";
        document.querySelector("#fecha").value = "";
        document.querySelector("#biopsia").value = "";
        document.querySelector("#descripcion").value = "";
        document.querySelector("#tipoEstudio").value = "";
        document.querySelector("#naturaleza").value = "";
        document.querySelector("#conservacion").value = "";
        document.querySelector("#calidad").value = "";
        document.querySelector("#procedencia").value = "";
    };

    // Función para imprimir una muestra
    const imprimirMuestra = (muestraId) => {
        window.open(`${BASE_URL}imprimir/muestra/${muestraId}`, '_blank');
    };

    // Inicializar la aplicación
    const inicializarApp = async () => {
        try {
            // 1. Cargar tipos de estudio
            await cargarTiposEstudio();

            // 2. Cargar formatos y sedes
            const formatosResponse = await fetch(`${BASE_URL}api/v1/formatos`);
            const sedesResponse = await fetch(`${BASE_URL}api/v1/sedes`);
            if (!formatosResponse.ok || !sedesResponse.ok) {
                throw new Error('Error al cargar datos iniciales');
            }

            const formatos = await formatosResponse.json();
            const sedes = await sedesResponse.json();

            // Poblar selects de formatos y sedes
            const conservacionSelect = document.querySelector("#conservacion");
            const procedenciaSelect = document.querySelector("#procedencia");

            conservacionSelect.innerHTML = '<option value="">Seleccione formato</option>';
            procedenciaSelect.innerHTML = '<option value="">Seleccione sede</option>';

            formatos.forEach(formato => {
                const option = document.createElement('option');
                option.value = formato.id;
                option.textContent = formato.nombre;
                conservacionSelect.appendChild(option);
            });

            sedes.forEach(sede => {
                const option = document.createElement('option');
                option.value = sede.id;
                option.textContent = sede.nombre;
                procedenciaSelect.appendChild(option);
            });

            // 3. Cargar muestras existentes
            await cargarMuestras();
        } catch (error) {
            console.error("Error inicializando la aplicación:", error);
            toastr.error("Error al inicializar la aplicación");
        }
    };

    // Iniciar la aplicación
    inicializarApp();
});
