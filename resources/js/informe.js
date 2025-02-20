document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = "http://localhost/Anatomia/public/";
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
                    <p><strong>Órgano:</strong> ${nombreOrgano}</p>
                    <p><strong>Descripción:</strong> ${muestra.descripcionMuestra}</p>
                    <div class="flex gap-2 mt-2">
                        <button class="btn-eliminar bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" data-id="${muestra.id}">Eliminar</button>
                        <button class="btn-editar bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700" data-id="${muestra.id}">Editar</button>
                        <button class="btn-imprimir bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" data-id="${muestra.id}">Imprimir</button>
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

        // Cargar y seleccionar tipo de estudio
        await cargarTiposEstudio();
        document.querySelector("#tipoEstudio").value = muestra.tipoEstudio_id;
        
        // Cargar y seleccionar tipo de naturaleza
        await cargarTiposNaturaleza(muestra.tipoEstudio_id);
        document.querySelector("#naturaleza").value = muestra.tipoNaturaleza_id;

        // Si es una biopsia, cargar y seleccionar órgano
        if (esBiopsia(muestra.tipoEstudio_id)) {
            await cargarOrganos();
            document.querySelector("#biopsia").value = muestra.organo;
            await cargarCalidadesPorOrgano(muestra.organo);
        } else {
            await cargarCalidadesPorNaturaleza(muestra.tipoNaturaleza_id);
        }

        document.querySelector("#calidad").value = muestra.calidad_id;
        document.querySelector("#conservacion").value = muestra.formato_id;
        document.querySelector("#procedencia").value = muestra.sede_id;

        document.getElementById("modalInforme").classList.remove("hidden");
        btnCrear.innerText = "Actualizar Informe";
    };

    // Función para cargar los tipos de estudio
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
                select.appendChild(option);
            });
            
            select.disabled = false;
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar tipos de naturaleza");
        }
    };

    // Función para cargar órganos
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
                option.setAttribute('data-codigo', organo.codigo);
                select.appendChild(option);
            });
            
            select.disabled = false;
        } catch (error) {
            console.error("Error:", error);
            toastr.error("Error al cargar órganos");
        }
    };

    // Función para cargar calidades según el tipo de naturaleza
    const cargarCalidadesPorNaturaleza = async (tipoNaturalezaId) => {
        const select = document.querySelector("#calidad");
        select.innerHTML = '<option value="">Seleccione calidad</option>'; 
        select.disabled = true;
    
        // Obtener la opción seleccionada del select de naturaleza
        const selectNaturaleza = document.querySelector("#naturaleza");
        const opcionSeleccionada = selectNaturaleza.options[selectNaturaleza.selectedIndex];
    
        if (!opcionSeleccionada) {
            console.error("No hay opción seleccionada en naturaleza.");
            toastr.error("Seleccione una naturaleza válida.");
            return;
        }
    
        const codigoNaturaleza = opcionSeleccionada.getAttribute("data-naturaleza");
    
        if (!codigoNaturaleza) {
            console.error("No se encontró el código de la naturaleza seleccionada.");
            toastr.error("La naturaleza seleccionada no tiene un código válido.");
            return;
        }
    
        try {
            const response = await fetch(`${BASE_URL}api/v4/calidades/${codigoNaturaleza}`);
            if (!response.ok) throw new Error(`Error en la petición: ${response.status}`);
    
            const data = await response.json();
            console.log("Respuesta de la API:", data);
    
            if (!Array.isArray(data) || data.length === 0) {
                toastr.warning("No hay calidades disponibles para esta naturaleza");
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
    


    // Función para cargar calidades según el órgano
    const cargarCalidadesPorOrgano = async (organoId) => {
        try {
            // Obtener el código del órgano seleccionado
            const selectBiopsia = document.querySelector("#biopsia");
            const opcionSeleccionada = selectBiopsia.options[selectBiopsia.selectedIndex];
            const codigoOrgano = opcionSeleccionada.getAttribute("data-codigo"); // Obtener el código del órgano
    
            if (!codigoOrgano) {
                throw new Error("No se encontró el código del órgano seleccionado");
            }
    
            // Hacer la petición con el código del órgano
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

    // Event Listeners para los selects en cascada
    document.querySelector("#tipoEstudio").addEventListener('change', function() {
        const tipoEstudioId = this.value;
        const biopsiaSelect = document.querySelector("#biopsia");
        const naturalezaSelect = document.querySelector("#naturaleza");
        const calidadSelect = document.querySelector("#calidad");

        // Resetear y deshabilitar selects dependientes
        naturalezaSelect.innerHTML = '<option value="">Seleccione naturaleza</option>';
        biopsiaSelect.innerHTML = '<option value="">Seleccione órgano</option>';
        calidadSelect.innerHTML = '<option value="">Seleccione calidad</option>';
        
        naturalezaSelect.disabled = true;
        biopsiaSelect.disabled = true;
        calidadSelect.disabled = true;

        if (tipoEstudioId) {
            cargarTiposNaturaleza(tipoEstudioId);
            if (esBiopsia(tipoEstudioId)) {
                cargarOrganos();
            }
        }
    });

    document.querySelector("#naturaleza").addEventListener('change', function() {
        const tipoNaturalezaId = this.value;
        const calidadSelect = document.querySelector("#calidad");
        
        calidadSelect.innerHTML = '<option value="">Seleccione calidad</option>';
        calidadSelect.disabled = true;

        if (tipoNaturalezaId && !esBiopsia(document.querySelector("#tipoEstudio").value)) {
            cargarCalidadesPorNaturaleza(tipoNaturalezaId);
        }
    });

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
        const tipoEstudioSelect = document.querySelector("#tipoEstudio");
        const opcionSeleccionada = tipoEstudioSelect.options[tipoEstudioSelect.selectedIndex];
        return opcionSeleccionada.text.toLowerCase().includes('biopsia');
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

        try {
            const url = muestraEditando 
                ? `${BASE_URL}api/v2/muestras/editar/${muestraEditando.id}`
                : `${BASE_URL}api/v2/muestras/crear`;
            
            const response = await fetch(url, {
                method: muestraEditando ? 'PUT' : 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
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

    // Función para cerrar el modal
    window.cerrarModal = () => {
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
    };

    // Función para imprimir una muestra
    const imprimirMuestra = (muestraId) => {
        window.open(`${BASE_URL}imprimir/muestra/${muestraId}`, '_blank');
    };

    // Inicializar la aplicación
    const inicializarApp = async () => {
        try {
            // Cargar datos iniciales
            await cargarTiposEstudio();
            
            // Cargar formatos y sedes
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
            
            // Cargar muestras existentes
            await cargarMuestras();
        } catch (error) {
            console.error("Error inicializando la aplicación:", error);
            toastr.error("Error al inicializar la aplicación");
        }
    };

    // Iniciar la aplicación
    inicializarApp();
});