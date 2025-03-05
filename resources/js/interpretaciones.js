document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = "http://localhost/Anatomia/public/";

    // Función para mostrar notificaciones
    const mostrarNotificacion = (mensaje, tipo = 'success') => {
        if (typeof toastr !== 'undefined') {
            toastr[tipo](mensaje);
        } else {
            console.log(mensaje);
        }
    };

    // Función para cargar las muestras con sus interpretaciones
    const cargarMuestras = async () => {
        try {
            const response = await fetch(`${BASE_URL}api/v5/muestras-interpretacion/listar`);
            if (!response.ok) {
                const error = await response.json();
                throw new Error(error.message || 'Error al cargar las muestras');
            }

            const data = await response.json();
            if (!data.status) {
                throw new Error(data.message || 'Error en la respuesta del servidor');
            }

            mostrarMuestrasEnDOM(data.data);
        } catch (error) {
            console.error("Error:", error);
            mostrarNotificacion("Error al cargar las muestras: " + error.message, "error");
        }
    };

    // Función para agrupar interpretaciones por muestra
    const agruparPorMuestra = (data) => {
        const muestrasMap = new Map();

        data.forEach(item => {
            if (!muestrasMap.has(item.muestra.id)) {
                muestrasMap.set(item.muestra.id, {
                    muestra: item.muestra,
                    interpretaciones: []
                });
            }
            muestrasMap.get(item.muestra.id).interpretaciones.push({
                id: item.id,
                calidad: item.calidad,
                interpretacion: item.interpretacion
            });
        });

        return Array.from(muestrasMap.values());
    };

    // Función para mostrar las muestras en el DOM
    const mostrarMuestrasEnDOM = (data) => {
        const container = document.getElementById('informesContainer');
        container.innerHTML = '';

        // Agrupar las interpretaciones por muestra
        const muestrasPorId = new Map();
        data.forEach(item => {
            const muestra = item.muestra;
            if (!muestrasPorId.has(muestra.id)) {
                muestrasPorId.set(muestra.id, {
                    ...muestra,
                    interpretaciones: []
                });
            }
            muestrasPorId.get(muestra.id).interpretaciones.push({
                id: item.id,
                interpretacion: item.interpretacion,
                descripcion: item.descripcion
            });
        });

        // Convertir el Map a Array, ordenar por ID de muestra y renderizar
        Array.from(muestrasPorId.values())
            .sort((a, b) => a.id - b.id)
            .forEach(muestra => {
                // Crear la fila principal de la muestra
                const muestraRow = document.createElement('tr');
                muestraRow.className = 'border-b';
                muestraRow.innerHTML = `
                    <td class="px-5 py-5 text-sm">
                        <div class="flex items-center">
                            <button class="toggle-interpretaciones mr-2">
                                <svg class="w-4 h-4 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            ${muestra.codigo}
                        </div>
                    </td>
                    <td class="px-5 py-5 text-sm">${muestra.tipoEstudio}</td>
                    <td class="px-5 py-5 text-sm"></td>
                `;

                // Crear la fila de interpretaciones (inicialmente oculta)
                const interpretacionesRow = document.createElement('tr');
                interpretacionesRow.className = 'interpretaciones-container hidden';
                interpretacionesRow.innerHTML = `
                    <td colspan="3" class="px-5 py-3 bg-gray-50">
                        <div class="pl-6 space-y-3">
                            ${muestra.interpretaciones.map(interp => `
                                <div class="flex justify-between items-start p-3 bg-white rounded shadow-sm">
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-900">${interp.interpretacion.codigo}</div>
                                        <div class="text-gray-700">${interp.interpretacion.descripcion}</div>
                                        ${interp.descripcion ? `
                                            <div class="mt-2 text-sm text-gray-600">
                                                <span class="font-medium">Observaciones:</span> ${interp.descripcion}
                                            </div>
                                        ` : ''}
                                    </div>
                                    <button onclick="eliminarInterpretacion(${interp.id})" class="ml-4 text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            `).join('')}
                            <div class="flex justify-end pt-3">
                                <button onclick="abrirModalNuevaInterpretacion(${muestra.id})"
                                        class="text-blue-600 hover:text-blue-900 font-medium">
                                    + Añadir Interpretación
                                </button>
                            </div>
                        </div>
                    </td>
                `;

                // Agregar las filas al contenedor
                container.appendChild(muestraRow);
                container.appendChild(interpretacionesRow);

                // Agregar el evento para mostrar/ocultar interpretaciones
                const toggleButton = muestraRow.querySelector('.toggle-interpretaciones');
                toggleButton.addEventListener('click', () => {
                    const arrow = toggleButton.querySelector('svg');
                    arrow.classList.toggle('rotate-180');
                    interpretacionesRow.classList.toggle('hidden');
                });
            });
    };

    // Función para eliminar una interpretación
    const eliminarInterpretacion = async (id) => {
        try {
            const response = await fetch(`${BASE_URL}api/v5/muestras-interpretacion/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                const error = await response.json();
                throw new Error(error.message || 'Error al eliminar la interpretación');
            }

            mostrarNotificacion('Interpretación eliminada con éxito');
            await cargarMuestras(); // Recargar la lista
        } catch (error) {
            console.error("Error:", error);
            mostrarNotificacion(error.message, "error");
        }
    };

    // Función para abrir el modal de nueva interpretación
    const abrirModalNuevaInterpretacion = async (muestraId) => {
        try {
            const response = await fetch(`${BASE_URL}api/v5/muestras-interpretacion/interpretaciones-disponibles/${muestraId}`);
            if (!response.ok) throw new Error('Error al obtener interpretaciones disponibles');

            const { data: interpretaciones, muestra } = await response.json();

            // Crear el modal con estilo similar al de muestras
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center';
            modal.innerHTML = `
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 w-11/12 md:w-3/4 lg:w-1/2 xl:w-2/5 mx-auto">
                    <!-- Header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Añadir Interpretación - ${muestra.organo}
                        </h3>
                        <button type="button" class="cancelar text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="p-6 space-y-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="interpretacionSelect">
                                    Seleccione una interpretación
                                </label>
                                <select id="interpretacionSelect" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="">Seleccione una interpretación</option>
                                    ${interpretaciones.map(i => `
                                        <option value="${i.id}">${i.codigo} - ${i.descripcion}</option>
                                    `).join('')}
                                </select>
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcionTextarea">
                                    Descripción (opcional)
                                </label>
                                <textarea id="descripcionTextarea"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    rows="3"
                                    placeholder="Agregue una descripción opcional"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b">
                        <button class="cancelar bg-gray-500 text-white active:bg-gray-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                            Cancelar
                        </button>
                        <button class="guardar bg-blue-600 text-white active:bg-blue-700 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                            Guardar
                        </button>
                    </div>
                </div>
            `;

            document.body.appendChild(modal);

            // Manejar eventos
            const cerrarModal = () => {
                modal.classList.add('opacity-0');
                setTimeout(() => modal.remove(), 200);
            };

            modal.querySelectorAll('.cancelar').forEach(btn => {
                btn.onclick = cerrarModal;
            });

            modal.querySelector('.guardar').onclick = async () => {
                try {
                    const interpretacionId = modal.querySelector('#interpretacionSelect').value;
                    const descripcion = modal.querySelector('#descripcionTextarea').value;

                    if (!interpretacionId) {
                        mostrarNotificacion('Por favor seleccione una interpretación', 'error');
                        return;
                    }

                    const response = await fetch(`${BASE_URL}api/v5/muestras-interpretacion/crear`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            idMuestras: muestraId,
                            idInterpretacion: interpretacionId,
                            descripcion: descripcion
                        })
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        throw new Error(data.message || 'Error al crear la interpretación');
                    }

                    mostrarNotificacion('Interpretación añadida con éxito');
                    cerrarModal();
                    await cargarMuestras();

                } catch (error) {
                    console.error('Error:', error);
                    mostrarNotificacion(error.message, 'error');
                }
            };

            // Cerrar modal con ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') cerrarModal();
            });

        } catch (error) {
            console.error('Error:', error);
            mostrarNotificacion('Error al cargar las interpretaciones disponibles', 'error');
        }
    };

    // Inicializar la aplicación
    cargarMuestras();

    // Hacer las funciones disponibles globalmente
    window.eliminarInterpretacion = eliminarInterpretacion;
    window.abrirModalNuevaInterpretacion = abrirModalNuevaInterpretacion;
});
