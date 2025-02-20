@extends('layouts.panel')

@section('title')
Panel
@endsection

@section('content')
<div class="flex items-center justify-center h-6">
    <button  class="px-20 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800"
        onclick="abrirModal()">
        Crear Informe
    </button>
</div>

<div class="container mt-10">
    <div class="row">
        <!-- Aquí se insertarán dinámicamente las muestras -->
    </div>
</div>




<div id="modalInforme" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white p-6 rounded-lg w-full max-w-md">
    <!-- Cabecera del Modal -->
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-semibold">Crear / Editar Muestra</h3>
      <button type="button" onclick="cerrarModal()" class="text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
    </div>
    <!-- Cuerpo del Modal -->
    <form id="formInforme" class="space-y-4">
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
        <label for="conservacion" class="block text-sm font-medium">Conservación</label>
        <select id="conservacion" class="mt-1 block w-full border rounded px-3 py-2">
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
      <!-- Descripción -->
      <div>
        <label for="descripcion" class="block text-sm font-medium">Descripción</label>
        <textarea id="descripcion" class="mt-1 block w-full border rounded px-3 py-2" rows="3" placeholder="Descripción de la muestra"></textarea>
      </div>
      <!-- Botón de Envío -->
      <div class="flex justify-end">
        <button id="btncrear" type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
          Guardar Informe
        </button>
      </div>
    </form>
  </div>
</div>
        






<script>
function abrirModal() {
    document.querySelector("#codigo").value = "";
    document.querySelector("#fecha").value = "";
    document.querySelector("#biopsia").value = "";
    document.querySelector("#descripcion").value = "";
    document.querySelector("#naturaleza").value = "";
    document.querySelector("#conservacion").value = "";
    document.querySelector("#procedencia").value = "";
    document.getElementById('modalInforme').classList.remove('hidden');
}

    function cerrarModal() {
        document.getElementById('modalInforme').classList.add('hidden');
    }
</script>


<!-- CSS de Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- JS de Toastr y jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection

@vite(['resources/js/informe.js'])
