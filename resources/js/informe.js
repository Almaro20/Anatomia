document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = "http://localhost/Anatomia/public/";
    const btnCrear = document.querySelector("#btncrear");
    let muestraEditando = null;
    let muestrasCreadas = new Set();

    // Función para cargar las muestras
    const cargarMuestras = async () => {
        try {
            const response = await fetch(`${BASE_URL}api/v2/muestras/listar`);
            if (!response.ok) throw new Error(`Error: ${response.status}`);
            
            const muestras = await response.json();
            const muestrasFiltradas = muestras.filter(muestra => {
                if (!muestrasCreadas.has(muestra.codigo)) {
                    muestrasCreadas.add(muestra.codigo);
                    return true;
                }
                return false;
            });
            actualizarMuestrasEnDOM(muestrasFiltradas);
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar las muestras");
        }
    };

    // Función para actualizar las muestras en el DOM
    const actualizarMuestrasEnDOM = (muestras) => {
        const container = document.querySelector(".container .row");
        container.innerHTML = "";
        muestras.forEach(muestra => agregarMuestraAlDOM(muestra));
    };

    // Función para agregar una muestra al DOM
    const agregarMuestraAlDOM = async (muestra) => {
        const nombreOrgano = await obtenerNombreOrgano(muestra.organo);
        const div = document.createElement("div");
        div.classList.add("col-md-4", "mt-8");
        div.innerHTML = `
            <div class="border border-dark p-2 rounded-lg shadow-md bg-white">
                <p><strong>Código:</strong> ${muestra.codigo}</p>
                <p><strong>Órgano:</strong> ${nombreOrgano}</p>
                <p><strong>Descripción:</strong> ${muestra.descripcionMuestra}</p>
                <button class="btn-eliminar bg-red-600 text-white px-4 py-2 rounded" data-id="${muestra.id}">Eliminar</button>
                <button class="btn-editar bg-green-600 text-white px-4 py-2 rounded" data-id="${muestra.id}">Editar</button>
                <button class="btn-imprimir bg-blue-600 text-white px-4 py-2 rounded" data-id="${muestra.id}">Imprimir</button>
            </div>`;
        container.appendChild(div);

        div.querySelector(".btn-eliminar").addEventListener("click", () => eliminarMuestra(muestra.id, div));
        div.querySelector(".btn-editar").addEventListener("click", () => abrirModalEdicion(muestra));
        div.querySelector(".btn-imprimir").addEventListener("click", () => imprimirMuestra(muestra.id));
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
            const response = await fetch(`${BASE_URL}api/v2/muestras/eliminar/${id}`, { method: "DELETE" });
            if (!response.ok) throw new Error(`Error al eliminar la muestra: ${response.status}`);
            toastr.success("Muestra eliminada con éxito");
            elemento.remove();
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al eliminar la muestra");
        }
    };

    // Función para abrir el modal de edición
    const abrirModalEdicion = (muestra) => {
        muestraEditando = muestra;
        document.querySelector("#codigo").value = muestra.codigo;
        document.querySelector("#fecha").value = muestra.fechaEntrada;
        document.querySelector("#biopsia").value = muestra.organo;
        document.querySelector("#descripcion").value = muestra.descripcionMuestra;
        document.querySelector("#naturaleza").value = muestra.tipoNaturaleza_id;
        document.querySelector("#conservacion").value = muestra.formato_id;
        document.querySelector("#procedencia").value = muestra.sede_id;
        document.querySelector("#tipoEstudio").value = muestra.tipoEstudio_id;

        cargarTiposNaturaleza(muestra.tipoEstudio_id);
        if (esBiopsia(muestra.tipoEstudio_id)) {
            cargarOrganos();
            cargarCalidadesPorOrgano(muestra.organo);
        } else {
            cargarCalidadesPorNaturaleza(muestra.tipoNaturaleza_id);
        }

        document.getElementById("modalInforme").classList.remove("hidden");
        btnCrear.innerText = "Actualizar Informe";
    };

    // Función para cargar los tipos de estudio
    const cargarTiposEstudio = async () => {
        try {
            const response = await fetch(`${BASE_URL}api/v1/tipos-estudio`);
            if (!response.ok) throw new Error('Error al cargar tipos de estudio');
            
            const tiposEstudio = await response.json();
            actualizarSelect("#tipoEstudio", tiposEstudio, "nombre");
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar tipos de estudio");
        }
    };

    // Función para cargar tipos de naturaleza basados en el tipo de estudio
    const cargarTiposNaturaleza = async (tipoEstudioId) => {
        try {
            const response = await fetch(`${BASE_URL}api/v1/tipos-naturaleza/${tipoEstudioId}`);
            if (!response.ok) throw new Error('Error al cargar tipos de naturaleza');
            
            const tiposNaturaleza = await response.json();
            actualizarSelect("#naturaleza", tiposNaturaleza, "nombre");
            document.querySelector("#naturaleza").disabled = false;
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar tipos de naturaleza");
        }
    };

    // Función para cargar órganos (solo para biopsias)
    const cargarOrganos = async () => {
        try {
            const response = await fetch(`${BASE_URL}api/v1/organos`);
            if (!response.ok) throw new Error('Error al cargar órganos');
            
            const organos = await response.json();
            actualizarSelect("#biopsia", organos, "nombre");
            document.querySelector("#biopsia").disabled = false;
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar órganos");
        }
    };

    // Función para cargar calidades según el tipo de naturaleza
    const cargarCalidadesPorNaturaleza = async (tipoNaturalezaId) => {
        try {
            const response = await fetch(`${BASE_URL}api/v4/calidades/tipo-naturaleza/${tipoNaturalezaId}`);
            if (!response.ok) throw new Error('Error al cargar calidades');
    
            const calidades = await response.json();
            actualizarSelect("#calidad", calidades, "descripcion");
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar calidades");
        }
    };

    // Función para cargar calidades según el órgano
    const cargarCalidadesPorOrgano = async (organoId) => {
        try {
            const response = await fetch(`${BASE_URL}api/v4/calidades/organo/${organoId}`);
            if (!response.ok) throw new Error('Error al cargar calidades por órgano');
    
            const calidades = await response.json();
            actualizarSelect("#calidad", calidades, "descripcion");
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar calidades por órgano");
        }
    };

    // Función para cargar interpretaciones según el órgano
    const cargarInterpretacionesPorOrgano = async (codigoOrgano) => {
        try {
            const response = await fetch(`${BASE_URL}api/v4/interpretaciones/${codigoOrgano}`);
            if (!response.ok) throw new Error('Error al cargar interpretaciones');
    
            const interpretaciones = await response.json();
            actualizarSelect("#interpretacion", interpretaciones, "descripcion");
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar interpretaciones");
        }
    };

    // Función genérica para actualizar selects
    const actualizarSelect = (selectId, datos, campoTexto) => {
        const select = document.querySelector(selectId);
        select.innerHTML = `<option value="">Seleccione una opción</option>`;
        datos.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = item[campoTexto];
            if (item.codigo) {
                option.setAttribute('data-codigo', item.codigo);
            }
            select.appendChild(option);
        });
        select.disabled = false;
    };

    // Función para verificar si es una biopsia
    const esBiopsia = (tipoEstudioId) => {
        const tipoEstudioSelect = document.querySelector("#tipoEstudio");
        const opcionSeleccionada = tipoEstudioSelect.options[tipoEstudioSelect.selectedIndex];
        return opcionSeleccionada.text.toLowerCase().includes('biopsia');
    };

    // Event Listeners para los selects
    document.querySelector("#tipoEstudio").addEventListener('change', function() {
        const tipoEstudioId = this.value;
        if (tipoEstudioId) {
            cargarTiposNaturaleza(tipoEstudioId);
            if (esBiopsia(tipoEstudioId)) {
                cargarOrganos();
            } else {
                document.querySelector("#biopsia").disabled = true;
                document.querySelector("#biopsia").innerHTML = '<option value="">Seleccione órgano</option>';
            }
        } else {
            document.querySelector("#naturaleza").disabled = true;
            document.querySelector("#biopsia").disabled = true;
            document.querySelector("#calidad").disabled = true;
            ["#naturaleza", "#biopsia", "#calidad"].forEach(id => {
                document.querySelector(id).innerHTML = '<option value="">Seleccione una opción</option>';
            });
        }
    });

    document.querySelector("#naturaleza").addEventListener('change', function() {
        const tipoNaturalezaId = this.value;
        if (tipoNaturalezaId && !esBiopsia(document.querySelector("#tipoEstudio").value)) {
            cargarCalidadesPorNaturaleza(tipoNaturalezaId);
        } else if (!esBiopsia(document.querySelector("#tipoEstudio").value)) {
            document.querySelector("#calidad").disabled = true;
            document.querySelector("#calidad").innerHTML = '<option value="">Seleccione calidad</option>';
        }
    });

    document.querySelector("#biopsia").addEventListener('change', function() {
        const organoId = this.value;
        const codigoOrgano = this.options[this.selectedIndex].getAttribute('data-codigo');
        if (organoId) {
            cargarCalidadesPorOrgano(organoId);
            if (codigoOrgano) {
                cargarInterpretacionesPorOrgano(codigoOrgano);
            }
        } else {
            document.querySelector("#calidad").disabled = true;
            document.querySelector("#calidad").innerHTML = '<option value="">Seleccione calidad</option>';
            document.querySelector("#interpretacion").disabled = true;
            document.querySelector("#interpretacion").innerHTML = '<option value="">Seleccione interpretación</option>';
        }
    });

    // Función para crear/editar muestra
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
            user_id: 1 // Asegúrate de obtener el ID del usuario actual
        };

        // Validaciones
        if (!formData.codigo || !formData.tipoEstudio_id || !formData.tipoNaturaleza_id) {
            toastr.error("Por favor complete todos los campos requeridos");
            return;
        }

        if (esBiopsia(formData.tipoEstudio_id) && !formData.organo) {
            toastr.error("Por favor seleccione un órgano para la biopsia");
            return;
        }

        if (!muestraEditando && muestrasCreadas.has(formData.codigo)) {
            toastr.error("Ya existe una muestra con este código");
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

            toastr.success(muestraEditando ? "Muestra actualizada" : "Muestra creada");
            if (!muestraEditando) muestrasCreadas.add(formData.codigo);
            
            cerrarModal();
            cargarMuestras();
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al guardar la muestra");
        }
    });

    // Función para cerrar el modal
    const cerrarModal = () => {
        document.getElementById('modalInforme').classList.add('hidden');
        muestraEditando = null;
        btnCrear.innerText = "Guardar Informe";
        // Limpiar los campos del formulario
        
        document.querySelector("#codigo").value = "";
        document.querySelector("#fecha").value = "";
        document.querySelector("#biopsia").value = "";
        document.querySelector("#descripcion").value = "";
        document.querySelector("#tipoEstudio").value = "";
        document.querySelector("#naturaleza").value = "";
        document.querySelector("#conservacion").value = "";
        document.querySelector("#calidad").value = "";
        document.querySelector("#procedencia").value = "";
        document.querySelector("#interpretacion").value = "";
    };

    // Función para imprimir una muestra
    const imprimirMuestra = (muestraId) => {
        const url = `${BASE_URL}imprimir/muestra/${muestraId}`;
        window.open(url, '_blank');
    };

    // Función para inicializar los selects
    const inicializarSelects = async () => {
        try {
            const endpoints = {
                tipoEstudio: "api/v1/tipos-estudio",
                procedencia: "api/v1/sedes",
                conservacion: "api/v1/formatos"
            };

            for (const [selectId, endpoint] of Object.entries(endpoints)) {
                const response = await fetch(`${BASE_URL}${endpoint}`);
                if (!response.ok) throw new Error(`Error cargando ${selectId}`);
                
                const datos = await response.json();
                actualizarSelect(`#${selectId}`, datos, "nombre");
            }
        } catch (error) {
            console.error("Error inicializando selects:", error);
            toastr.error("Error al cargar los datos iniciales");
        }
    };

    // Inicializar la aplicación
    inicializarSelects();
    cargarMuestras();
});