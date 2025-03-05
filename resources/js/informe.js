document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = "http://localhost/Anatomia/public/";
    const btnCrear = document.querySelector("#btncrear");
    const btnGuardar = document.querySelector("#btnGuardar");
    let muestraEditando = null;
    let muestrasCreadas = new Set();

    // Función para mostrar notificaciones
    const mostrarNotificacion = (mensaje, tipo = 'success') => {
        if (typeof toastr !== 'undefined') {
            switch(tipo) {
                case 'success':
                    toastr.success(mensaje);
                    break;
                case 'error':
                    toastr.error(mensaje);
                    break;
                case 'warning':
                    toastr.warning(mensaje);
                    break;
                case 'info':
                    toastr.info(mensaje);
                    break;
            }
        } else {
            console.log(mensaje);
        }
    };

    // Función para cargar las muestras existentes
    const cargarMuestras = async () => {
        try {
            const response = await fetch(`${BASE_URL}api/v2/muestras/listar`);
            if (!response.ok) throw new Error(`Error: ${response.status}`);

            const muestras = await response.json();
            const container = document.querySelector("tbody#informesContainer");
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
            mostrarNotificacion("Error al cargar las muestras", "error");
        }
    };


    // Función para agregar una muestra al DOM
    const agregarMuestraAlDOM = async (muestra) => {
        try {
            // Obtener el nombre del tipo de estudio
            const tipoEstudioResponse = await fetch(`${BASE_URL}api/v1/tipos-estudio`);
            const tiposEstudio = await tipoEstudioResponse.json();
            const tipoEstudio = tiposEstudio.find(t => t.id === muestra.tipoEstudio_id)?.nombre || 'Desconocido';

            // Obtener el nombre del formato
            const formatoResponse = await fetch(`${BASE_URL}api/v1/formatos`);
            const formatos = await formatoResponse.json();
            const formato = formatos.find(f => f.id === muestra.formato_id)?.nombre || 'Desconocido';

            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    ${muestra.codigo}
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    ${tipoEstudio}
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    ${formato}
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex gap-2">
                    <button class="btn-eliminar text-red-600 hover:text-red-900" data-id="${muestra.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="btn-editar text-blue-600 hover:text-blue-900" data-id="${muestra.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </button>
                    <button class="btn-imprimir text-green-600 hover:text-green-900" data-id="${muestra.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </td>`;

            const container = document.querySelector("tbody#informesContainer");
            container.appendChild(tr);

            // Event listeners para los botones
            tr.querySelector(".btn-eliminar").addEventListener("click", () => eliminarMuestra(muestra.id, tr));
            tr.querySelector(".btn-editar").addEventListener("click", () => abrirModalEdicion(muestra));
            tr.querySelector(".btn-imprimir").addEventListener("click", () => imprimirMuestra(muestra.id));
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

            mostrarNotificacion("Muestra eliminada con éxito", "success");
            elemento.remove();
        } catch (error) {
            console.error("Error:", error);
            mostrarNotificacion("Error al eliminar la muestra", "error");
        }
    };

    // Función para abrir el modal de edición
    const abrirModalEdicion = async (muestra) => {
        try {
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
                if (muestra.organo) {
                    await cargarCalidadesPorOrgano(muestra.organo);
                }
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
            document.querySelector("#btnGuardar").textContent = "Actualizar Informe";
        } catch (error) {
            console.error("Error al abrir el modal de edición:", error);
            mostrarNotificacion("Error al cargar los datos para edición", "error");
        }
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
            mostrarNotificacion("Error al cargar tipos de estudio", "error");
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
            mostrarNotificacion("Error al cargar tipos de naturaleza", "error");
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
                option.value = organo.codigo; // Usamos el código en lugar del ID
                option.textContent = organo.nombre;
                option.setAttribute('data-codigo', organo.codigo);
                select.appendChild(option);
            });

            select.disabled = false;
        } catch (error) {
            console.error("Error:", error);
            mostrarNotificacion("Error al cargar órganos", "error");
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
                mostrarNotificacion("No hay calidades disponibles para este estudio", "warning");
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
            mostrarNotificacion("Error al cargar calidades", "error");
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
            mostrarNotificacion("Error al cargar calidades por órgano", "error");
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
        const organoValue = this.value;
        const calidadSelect = document.querySelector("#calidad");

        calidadSelect.innerHTML = '<option value="">Seleccione calidad</option>';
        calidadSelect.disabled = true;

        if (organoValue) {
            cargarCalidadesPorOrgano(organoValue);
        }
    });

    // Función para verificar si es una biopsia
    const esBiopsia = (tipoEstudioId) => {
        const option = document.querySelector(`#tipoEstudio option[value="${tipoEstudioId}"]`);
        return option ? option.text.toLowerCase().includes('biopsia') : false;
    };

    // Event listener para el botón de guardar
    btnGuardar.addEventListener('click', async function(event) {
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
            mostrarNotificacion("Por favor complete todos los campos requeridos", "error");
            return;
        }

        if (esBiopsia(formData.tipoEstudio_id) && !formData.organo) {
            mostrarNotificacion("Por favor seleccione un órgano para la biopsia", "error");
            return;
        }

        try {
            const url = muestraEditando
                ? `${BASE_URL}api/v2/muestras/editar/${muestraEditando.id}`
                : `${BASE_URL}api/v2/muestras/crear`;

            const response = await fetch(url, {
                method: muestraEditando ? 'PUT' : 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || `Error: ${response.status}`);
            }

            const data = await response.json();
            mostrarNotificacion(muestraEditando ? "Muestra actualizada con éxito" : "Muestra creada con éxito", "success");

            // Si estamos editando, eliminamos el código anterior del Set
            if (muestraEditando) {
                muestrasCreadas.delete(muestraEditando.codigo);
            }
            
            // Agregamos el nuevo código al Set
            muestrasCreadas.add(formData.codigo);

            cerrarModal();
            await cargarMuestras(); // Esperamos a que se recarguen las muestras
        } catch (error) {
            console.error("Error:", error);
            mostrarNotificacion(error.message || "Error al guardar la muestra", "error");
        }
    });

    // Función para abrir el modal
    window.abrirModal = () => {
        document.getElementById('modalInforme').classList.remove('hidden');
        muestraEditando = null;
        document.querySelector("#btnGuardar").textContent = "Guardar Informe";

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

        // Deshabilitar campos que dependen de selecciones previas
        document.querySelector("#naturaleza").disabled = true;
        document.querySelector("#biopsia").disabled = true;
        document.querySelector("#calidad").disabled = true;
    };

    // Función para cerrar el modal
    window.cerrarModal = () => {
        document.getElementById('modalInforme').classList.add('hidden');
    };

    // Función para imprimir una muestra
    const imprimirMuestra = (muestraId) => {
        try {
            const url = `${BASE_URL}imprimir/muestra/${muestraId}`;
            window.open(url, '_blank');
        } catch (error) {
            console.error("Error al abrir el PDF:", error);
            mostrarNotificacion("Error al generar el PDF", "error");
        }
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
            mostrarNotificacion("Error al inicializar la aplicación", "error");
        }
    };

    // Iniciar la aplicación
    inicializarApp();
});
