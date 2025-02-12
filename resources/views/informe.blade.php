@extends('layouts.panel')

@section('title')
Panel
@endsection

@section('content')
<div class="flex items-center justify-center h-6">
    <button id="btncrear" class="px-20 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">
        Crear Informe
    </button>
</div>
<div class="container mt-10">
    <div class="row">
        <!-- Aquí se insertarán dinámicamente las muestras -->
    </div>
</div>


@endsection

@vite(['resources/js/informe.js'])
