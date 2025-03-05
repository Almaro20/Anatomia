@extends('layouts.panel')

@section('title')
Clinica SerranitoxXx
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Código
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Fecha de Entrada
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tipo de Estudio
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody id="informesContainer">
                <!-- Aquí se insertarán dinámicamente las muestras -->
            </tbody>
        </table>
    </div>
</div>

<!-- El resto del código del modal y scripts permanece igual -->

<script>
// Función para crear una fila de informe
function crearFilaInforme(informe) {
    return `
    <tr>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            ${informe.codigo}
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            ${informe.fecha}
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            ${informe.tipoEstudio}
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <button class="text-blue-600 hover:text-blue-900 mr-2" onclick="editarInforme(${informe.id})">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
            </button>
            <button class="text-red-600 hover:text-red-900" onclick="eliminarInforme(${informe.id})">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </button>
        </td>
    </tr>
    `;
}

// Función para mostrar los informes
function mostrarInformes(informes) {
    const container = document.getElementById('informesContainer');
    container.innerHTML = '';
    informes.forEach(informe => {
        container.innerHTML += crearFilaInforme(informe);
    });
}

// Asegúrate de que esta función se llame cuando se carguen los informes
// Por ejemplo, si estás usando AJAX para cargar los informes:
function cargarInformes() {
    // Aquí iría tu lógica para obtener los informes
    // Por ejemplo, usando fetch:
    fetch('/api/informes')
        .then(response => response.json())
        .then(data => {
            mostrarInformes(data);
        })
        .catch(error => console.error('Error:', error));
}

// Llama a cargarInformes cuando se carga la página
document.addEventListener('DOMContentLoaded', cargarInformes);
</script>

@endsection

@vite(['resources/js/informe.js'])