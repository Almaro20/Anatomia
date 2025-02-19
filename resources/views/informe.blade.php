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



<!-- Modal -->
<div id="modalInforme" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2">
        <div class="p-5 border-b flex justify-between items-center">
            <h3 class="text-xl font-semibold">Nuevo Informe</h3>
            <button class="text-gray-500 hover:text-gray-700" onclick="cerrarModal()">&times;</button>
        </div>
        <div class="p-5">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="codigo" class="block text-sm font-medium text-gray-700">Código de la muestra</label>
                        <input type="text" id="codigo" name="codigo" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                        <input type="date" id="fecha" name="fecha" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label for="tipoEstudio" class="block text-sm font-medium text-gray-700">Tipo de Estudio</label>
                        <select id="tipoEstudio" name="tipoEstudio" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="">Seleccione un tipo de estudio</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="naturaleza" class="block text-sm font-medium text-gray-700">Naturaleza de la muestra</label>
                        <select id="naturaleza" name="naturaleza" class="w-full border border-gray-300 rounded-lg px-3 py-2" disabled>
                            <option value="">Seleccione naturaleza</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="biopsia" class="block text-sm font-medium text-gray-700">Órgano (solo para biopsias)</label>
                        <select id="biopsia" name="biopsia" class="w-full border border-gray-300 rounded-lg px-3 py-2" disabled>
                            <option value="">Seleccione órgano</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="calidad" class="block text-sm font-medium text-gray-700">Calidad de la muestra</label>
                        <select id="calidad" name="calidad" class="w-full border border-gray-300 rounded-lg px-3 py-2" disabled>
                            <option value="">Seleccione calidad</option>
                        </select>
                    </div>
                        <
                       
                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 mr-2" onclick="cerrarModal()">Cancelar</button>
                    <button id="btncrear" type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Guardar Informe</button>
                </div>
            </form>
        </div>
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
