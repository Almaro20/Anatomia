document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = "http://localhost/Anatomia/public/";
    const btnCrear = document.querySelector("#btncrear");
    const btnGuardar = document.querySelector("#btnGuardar");
    let muestraEditando = null;
    let muestrasCreadas = new Set();
    let imagenesSeleccionadas = new Map(); // Para almacenar las imágenes y sus zooms

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

            const row = document.createElement('tr');
            row.className = 'border-b';
            row.innerHTML = `
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    ${muestra.codigo || ''}
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    ${tipoEstudio}
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    ${formato}
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex gap-2">
                    <button class="editar-muestra text-blue-600 hover:text-blue-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="eliminar-muestra text-red-600 hover:text-red-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                    <button class="imprimir-muestra text-green-600 hover:text-green-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                    </button>
                </td>
            `;

            // Agregar eventos a los botones
            const btnEditar = row.querySelector('.editar-muestra');
            const btnEliminar = row.querySelector('.eliminar-muestra');
            const btnImprimir = row.querySelector('.imprimir-muestra');

            btnEditar.addEventListener('click', () => abrirModalEdicion(muestra));
            btnEliminar.addEventListener('click', () => eliminarMuestra(muestra.id, row));
            btnImprimir.addEventListener('click', () => imprimirMuestra(muestra.id));

            // Agregar la fila al contenedor correcto
            const container = document.querySelector('#informesContainer');
            container.appendChild(row);
            
            // Marcar la muestra como creada
            muestrasCreadas.add(muestra.id);
        } catch (error) {
            console.error("Error al agregar muestra al DOM:", error);
            mostrarNotificacion("Error al mostrar la muestra", "error");
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
        // Configurar toastr para este caso específico
        toastr.options = {
            closeButton: true,
            timeOut: 0,
            extendedTimeOut: 0,
            positionClass: "toast-top-center",
            preventDuplicates: true,
            onclick: null
        };

        // Mostrar el mensaje de confirmación con toastr
        toastr.warning(
            '<div class="flex flex-col space-y-2">' +
            '<div>¿Está seguro de que desea eliminar esta muestra?</div>' +
            '<div class="flex justify-end space-x-2">' +
            '<button class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-600" onclick="toastr.clear()">Cancelar</button>' +
            '<button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="confirmarEliminacion(' + id + ')">Eliminar</button>' +
            '</div>' +
            '</div>',
            'Confirmar eliminación',
            {
                allowHtml: true,
                closeButton: false,
                progressBar: false
            }
        );
    };

    // Función para manejar la confirmación de eliminación
    window.confirmarEliminacion = async (id) => {
        try {
            const response = await fetch(`${BASE_URL}api/v2/muestras/eliminar/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const data = await response.json();

            if (!response.ok) {
                let errorMessage = data.message || 'Error al eliminar la muestra';
                if (errorMessage.includes('foreign key constraint fails')) {
                    errorMessage = 'No se puede eliminar la muestra porque tiene interpretaciones asociadas. Por favor, elimine primero las interpretaciones.';
                } else if (errorMessage.includes('No query results for model')) {
                    errorMessage = 'La muestra ya no existe en el sistema. La página se actualizará.';
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                }
                throw new Error(errorMessage);
            }

            // Limpiar el toastr de confirmación
            toastr.clear();

            // Eliminar el elemento del DOM
            const row = document.querySelector(`tr:has(button[onclick*="eliminarMuestra(${id})"])`);
            if (row) {
                row.remove();
                // Mostrar mensaje de éxito
                toastr.success('Muestra eliminada con éxito');
            } else {
                // Si no encontramos la fila, recargamos la lista de muestras
                cargarMuestras();
            }
        } catch (error) {
            console.error("Error:", error);
            toastr.clear(); // Limpiar el toastr de confirmación
            toastr.error(error.message);
        }
    };

    // Función para abrir el modal
    window.abrirModal = async () => {
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
        document.querySelector("#formato").value = "";
        document.querySelector("#calidad").value = "";
        document.querySelector("#procedencia").value = "";
        document.querySelector("#imagenesPreview").innerHTML = "";

        // Deshabilitar campos que dependen de selecciones previas
        document.querySelector("#naturaleza").disabled = true;
        document.querySelector("#biopsia").disabled = true;
        document.querySelector("#calidad").disabled = true;

        // Cargar datos iniciales
        await Promise.all([
            cargarTiposEstudio(),
            cargarFormatos(),
            cargarSedes()
        ]);
    };

    // Función para cargar los formatos
    const cargarFormatos = async () => {
        try {
            const response = await fetch(`${BASE_URL}api/v1/formatos`);
            if (!response.ok) throw new Error('Error al cargar formatos');

            const formatos = await response.json();
            const select = document.querySelector("#formato");
            select.innerHTML = '<option value="">Seleccione formato</option>';

            formatos.forEach(formato => {
                const option = document.createElement('option');
                option.value = formato.id;
                option.textContent = formato.nombre;
                select.appendChild(option);
            });
        } catch (error) {
            console.error("Error:", error);
            mostrarNotificacion("Error al cargar formatos", "error");
        }
    };

    // Función para cargar las sedes
    const cargarSedes = async () => {
        try {
            const response = await fetch(`${BASE_URL}api/v1/sedes`);
            if (!response.ok) throw new Error('Error al cargar sedes');

            const sedes = await response.json();
            const select = document.querySelector("#procedencia");
            select.innerHTML = '<option value="">Seleccione sede</option>';

            sedes.forEach(sede => {
                const option = document.createElement('option');
                option.value = sede.id;
                option.textContent = sede.nombre;
                select.appendChild(option);
            });
        } catch (error) {
            console.error("Error:", error);
            mostrarNotificacion("Error al cargar sedes", "error");
        }
    };

    // Función para abrir el modal de edición
    const abrirModalEdicion = async (muestra) => {
        try {
            // Obtener los datos completos de la muestra
            const response = await fetch(`${BASE_URL}api/v2/muestras/ver/${muestra.id}`);
            if (!response.ok) throw new Error('Error al cargar la muestra');
            
            const muestraData = await response.json();
            muestraEditando = muestraData;

            // Cargar datos iniciales
            await Promise.all([
                cargarTiposEstudio(),
                cargarFormatos(),
                cargarSedes()
            ]);

            // Llenar los campos del formulario
            document.querySelector("#codigo").value = muestraData.codigo;
            document.querySelector("#fecha").value = muestraData.fechaEntrada;
            document.querySelector("#descripcion").value = muestraData.descripcionMuestra;
            document.querySelector("#formato").value = muestraData.formato_id;
            document.querySelector("#procedencia").value = muestraData.sede_id;

            // Cargar y establecer tipo de estudio
            document.querySelector("#tipoEstudio").value = muestraData.tipoEstudio_id;
            await cargarTiposNaturaleza(muestraData.tipoEstudio_id);
            document.querySelector("#naturaleza").value = muestraData.tipoNaturaleza_id;

            // Manejar biopsia vs no biopsia
            if (esBiopsia(muestraData.tipoEstudio_id)) {
                await cargarOrganos();
                document.querySelector("#biopsia").value = muestraData.organo;
                if (muestraData.organo) {
                    await cargarCalidadesPorOrgano(muestraData.organo);
                }
            } else {
                const selectedTipo = document.querySelector(`#tipoEstudio option[value="${muestraData.tipoEstudio_id}"]`);
                const codigoEstudio = selectedTipo ? selectedTipo.getAttribute('data-codigo') : '';
                if (codigoEstudio) {
                    await cargarCalidadesPorTipoEstudio(codigoEstudio);
                }
            }

            document.querySelector("#calidad").value = muestraData.calidad_id;

            // Mostrar imagen si existe
            const container = document.querySelector("#imagenesPreview");
            container.innerHTML = '';
            
            if (muestraData.imagen) {
                const imgContainer = document.createElement('div');
                imgContainer.className = 'relative';
                
                const img = document.createElement('img');
                img.src = muestraData.imagen.url;
                img.className = 'w-full h-48 object-cover rounded';
                
                const zoomText = document.createElement('span');
                zoomText.className = 'absolute bottom-0 right-0 bg-black bg-opacity-50 text-white px-2 py-1 text-sm rounded';
                zoomText.textContent = muestraData.imagen.zoom.zoom;
                
                const deleteBtn = document.createElement('button');
                deleteBtn.className = 'absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600';
                deleteBtn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                deleteBtn.onclick = () => {
                    imgContainer.remove();
                    imagenesSeleccionadas.clear();
                };
                
                imgContainer.appendChild(img);
                imgContainer.appendChild(zoomText);
                imgContainer.appendChild(deleteBtn);
                container.appendChild(imgContainer);
            }

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

        // Crear FormData para enviar tanto datos como archivos
        const formData = new FormData();

        // Obtener todos los valores del formulario
        const codigo = document.querySelector("#codigo").value;
        const fechaEntrada = document.querySelector("#fecha").value;
        const tipoEstudio = document.querySelector("#tipoEstudio").value;
        const naturaleza = document.querySelector("#naturaleza").value;
        const organo = document.querySelector("#biopsia").value;
        const calidad = document.querySelector("#calidad").value;
        const formato = document.querySelector("#formato").value;
        const procedencia = document.querySelector("#procedencia").value;
        const descripcion = document.querySelector("#descripcion").value;

        // Validar campos requeridos
        if (!codigo || !fechaEntrada || !tipoEstudio || !naturaleza || !calidad || !formato || !procedencia) {
            mostrarNotificacion('Por favor complete todos los campos requeridos', 'error');
            return;
        }

        // Agregar los campos del formulario
        formData.append('codigo', codigo);
        formData.append('fechaEntrada', fechaEntrada);
        formData.append('tipoEstudio_id', tipoEstudio);
        formData.append('tipoNaturaleza_id', naturaleza);
        formData.append('organo', organo);
        formData.append('descripcionMuestra', descripcion);
        formData.append('formato_id', formato);
        formData.append('calidad_id', calidad);
        formData.append('sede_id', procedencia);
        formData.append('user_id', 1);

        // Obtener las imágenes y el zoom
        const imagenesInput = document.querySelector("#imagen");
        const zoomSelect = document.querySelector("#zoom");
        const imagenesPreview = document.querySelector("#imagenesPreview");

        // Manejar imágenes
        if (imagenesInput.files.length > 0) {
            const zoom = zoomSelect.value;
            if (!zoom) {
                mostrarNotificacion('Por favor seleccione un zoom para las imágenes', 'error');
                return;
            }
            
            Array.from(imagenesInput.files).forEach(file => {
                formData.append('imagenes[]', file);
            });
            formData.append('zooms', JSON.stringify([zoom]));
        } else if (muestraEditando && imagenesPreview.children.length === 0) {
            formData.append('eliminar_imagen', 'true');
        }

        try {
            const url = muestraEditando 
                ? `${BASE_URL}api/v2/muestras/editar/${muestraEditando.id}`
                : `${BASE_URL}api/v2/muestras/crear`;

            const method = muestraEditando ? 'PUT' : 'POST';

            // Para PUT requests, necesitamos agregar el método _method
            if (method === 'PUT') {
                formData.append('_method', 'PUT');
            }

            const response = await fetch(url, {
                method: 'POST', // Siempre usamos POST con FormData
                body: formData
            });

            if (!response.ok) {
                const error = await response.json();
                throw new Error(error.message || 'Error al guardar la muestra');
            }

            const data = await response.json();
            mostrarNotificacion(muestraEditando ? 'Muestra actualizada con éxito' : 'Muestra creada con éxito');
            cerrarModal();
            cargarMuestras();
        } catch (error) {
            console.error('Error:', error);
            mostrarNotificacion(error.message, 'error');
        }
    });

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

    // Función para manejar la previsualización de imágenes
    const handleImagePreview = () => {
        const fileInput = document.getElementById('imagen');
        const zoomSelect = document.getElementById('zoom');
        const container = document.getElementById('imagenesPreview');
        const files = fileInput.files;
        const zoom = zoomSelect.value;

        if (!zoom) {
            mostrarNotificacion('Por favor seleccione un nivel de zoom primero', 'error');
            fileInput.value = '';
            return;
        }

        // Limpiar el contenedor
        container.innerHTML = '';

        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.className = 'relative';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-48 object-cover rounded';
                
                const zoomText = document.createElement('span');
                zoomText.className = 'absolute bottom-0 right-0 bg-black bg-opacity-50 text-white px-2 py-1 text-sm rounded';
                zoomText.textContent = zoom;
                
                const deleteBtn = document.createElement('button');
                deleteBtn.className = 'absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600';
                deleteBtn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                deleteBtn.onclick = () => {
                    imgContainer.remove();
                    fileInput.value = '';
                    zoomSelect.value = '';
                };
                
                imgContainer.appendChild(img);
                imgContainer.appendChild(zoomText);
                imgContainer.appendChild(deleteBtn);
                container.appendChild(imgContainer);
            };
            reader.readAsDataURL(file);
        });
    };

    // Inicializar la aplicación
    const inicializarApp = async () => {
        await cargarMuestras();
        
        // Event listeners para imágenes
        const imageInput = document.getElementById('imagen');
        const zoomSelect = document.getElementById('zoom');
        
        imageInput.addEventListener('change', () => {
            const zoom = zoomSelect.value;
            if (!zoom) {
                mostrarNotificacion('Por favor seleccione un nivel de zoom primero', 'error');
                imageInput.value = '';
                return;
            }
            handleImagePreview();
        });
    };

    // Iniciar la aplicación
    inicializarApp();
});
