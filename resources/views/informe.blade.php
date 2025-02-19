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
                        <label for="naturaleza" class="block text-sm font-medium text-gray-700">Naturaleza de la muestra</label>
                        <select id="naturaleza" name="naturaleza" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option>Tipo</option>
                        </select>
                    </div>
                    <div>
                        <label for="biopsia" class="block text-sm font-medium text-gray-700">Opciones biopsia</label>
                        <select id="biopsia" name="biopsia" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option>Órgano</option>
                        </select>
                    </div>
                    <div>
                        <label for="conservacion" class="block text-sm font-medium text-gray-700">Conservación de muestra</label>
                        <select id="conservacion" name="conservacion" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option>Formato</option>
                        </select>
                    </div>
                    <div>
                        <label for="procedencia" class="block text-sm font-medium text-gray-700">Centro de procedencia</label>
                        <select id="procedencia" name="procedencia" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option>Sede</option>
                        </select>
                    </div>
                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>

                    <!-- Campo de imagen -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Subir Imagen</label>
                        <input type="file" id="image" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                    </div>

                    <!-- Campo de zoom -->
                    <div>
                        <label for="zoom" class="block text-sm font-medium text-gray-700">Selecciona el nivel de zoom:</label>
                        <select id="zoom" name="zoom" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                            <option value="x4">x4</option>
                            <option value="x10">x10</option>
                            <option value="x40">x40</option>
                            <option value="x100">x100</option>
                        </select>
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
