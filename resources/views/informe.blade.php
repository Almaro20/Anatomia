informe:
@extends('layouts.panel')

@section('title')
Clinica SerranitoxXx
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-4 flex justify-end">
        <button id="btncrear" class="p-2 bg-blue-700 text-white rounded-full hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50"
            onclick="abrirModal()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </button>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Código
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tipo de Estudio
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Formato
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

<div id="modalInforme" class="fixed inset-0 flex items-start justify-center bg-black bg-opacity-50 p-4 overflow-y-auto hidden">
    <div class="bg-white p-6 rounded-lg w-full max-w-4xl my-8">
      <!-- Cabecera del Modal -->
      <div class="flex justify-between items-center mb-4 sticky top-0 bg-white z-10">
        <h3 class="text-xl font-semibold">Crear / Editar Muestra</h3>
        <button type="button" onclick="cerrarModal()" class="text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
      </div>
      <!-- Cuerpo del Modal -->
      <form id="formInforme" class="space-y-4 max-h-[80vh] overflow-y-auto" onsubmit="return false;">
        <!-- Grid de campos -->
        <div class="grid grid-cols-2 gap-4">
          <!-- Código -->
          <div>
            <label for="codigo" class="block text-sm font-medium">Código</label>
            <input type="text" id="codigo" class="mt-1 block w-full border rounded px-3 py-2" placeholder="Ingrese el código">
          </div>
          <!-- Fecha de Entrada -->
          <div>
            <label for="fecha" class="block text-sm font-medium">Fecha de Entrada</label>
            <input type="date" id="fecha" class="mt-1 block w-full border rounded px-3 py-2">
          </div>
          <!-- Tipo de Estudio -->
          <div>
            <label for="tipoEstudio" class="block text-sm font-medium">Tipo de Estudio</label>
            <select id="tipoEstudio" class="mt-1 block w-full border rounded px-3 py-2">
              <option value="">Seleccione un tipo de estudio</option>
              <!-- Se llenará dinámicamente -->
            </select>
          </div>
          <!-- Tipo de Naturaleza -->
          <div>
            <label for="naturaleza" class="block text-sm font-medium">Tipo de Naturaleza</label>
            <select id="naturaleza" class="mt-1 block w-full border rounded px-3 py-2" disabled>
              <option value="">Seleccione naturaleza</option>
              <!-- Se llenará dinámicamente -->
            </select>
          </div>
          <!-- Órgano (para Biopsia) -->
          <div>
            <label for="biopsia" class="block text-sm font-medium">Órgano (Biopsia)</label>
            <select id="biopsia" class="mt-1 block w-full border rounded px-3 py-2" disabled>
              <option value="">Seleccione órgano</option>
              <!-- Se llenará dinámicamente -->
            </select>
          </div>
          <!-- Calidad -->
          <div>
            <label for="calidad" class="block text-sm font-medium">Calidad</label>
            <select id="calidad" class="mt-1 block w-full border rounded px-3 py-2" disabled>
              <option value="">Seleccione calidad</option>
              <!-- Se llenará dinámicamente -->
            </select>
          </div>
          <!-- Conservación / Formato -->
          <div>
            <label for="formato" class="block text-sm font-medium">Formato</label>
            <select id="formato" class="mt-1 block w-full border rounded px-3 py-2">
              <option value="">Seleccione formato</option>
              <!-- Se llenará dinámicamente -->
            </select>
          </div>
          <!-- Procedencia / Sede -->
          <div>
            <label for="procedencia" class="block text-sm font-medium">Procedencia</label>
            <select id="procedencia" class="mt-1 block w-full border rounded px-3 py-2">
              <option value="">Seleccione sede</option>
              <!-- Se llenará dinámicamente -->
            </select>
          </div>
        </div>
        <!-- Descripción en ancho completo -->
        <div>
          <label for="descripcion" class="block text-sm font-medium">Descripción</label>
          <textarea id="descripcion" class="mt-1 block w-full border rounded px-3 py-2" rows="3" placeholder="Descripción de la muestra"></textarea>
        </div>

        <!-- Sección de imágenes -->
        <div class="space-y-4">
          <div class="flex gap-4 items-end">
            <div class="flex-1">
              <label for="imagen" class="block text-sm font-medium">Imágenes</label>
              <input type="file" id="imagen" accept="image/*" multiple class="mt-1 block w-full border rounded px-3 py-2">
            </div>
            <div class="w-48">
              <label for="zoom" class="block text-sm font-medium">Zoom</label>
              <select id="zoom" class="mt-1 block w-full border rounded px-3 py-2">
                <option value="">Seleccione zoom</option>
                <option value="4x">4x</option>
                <option value="10x">10x</option>
                <option value="40x">40x</option>
                <option value="100x">100x</option>
              </select>
            </div>
          </div>
          <div id="imagenesPreview" class="grid grid-cols-3 gap-4">
            <!-- Las previsualizaciones se insertarán aquí dinámicamente -->
          </div>
        </div>

        <!-- Botón de Envío -->
        <div class="flex justify-end">
          <button type="button" id="btnGuardar" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Guardar Informe
          </button>
        </div>
      </form>
    </div>
  </div>

<!-- jQuery primero -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Toastr JS después de jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
// Configuración de Toastr
$(document).ready(function() {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
});
</script>

@vite(['resources/js/informe.js'])
@endsection