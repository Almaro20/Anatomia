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
        <div class="col-md-4 mt-8">
            <div class="border border-dark" style="width: 100%; height: 150px; overflow: hidden;">
                <p>Muestra</p>
            </div>
        </div>
        <div class="col-md-4 mt-8">
            <div class="border border-dark" style="width: 100%; height: 150px; overflow: hidden;">
                <p>Muestra</p>
            </div>
        </div>
        <div class="col-md-4 mt-8">
            <div class="border border-dark" style="width: 100%; height: 150px; overflow: hidden;">
                <p>Muestra</p>
            </div>
        </div>
    </div>
</div>


@endsection

@vite(['resources/js/informe.js'])
