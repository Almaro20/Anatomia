@extends('layouts.panel')

@section('title')
Clinica SerranitoxXx - Interpretaciones
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
                        Descripción
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tipo de Estudio
                    </th>
                </tr>
            </thead>
            <tbody id="informesContainer">
                <!-- Aquí se insertarán dinámicamente las muestras con sus interpretaciones -->
            </tbody>
        </table>
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

@vite(['resources/js/interpretaciones.js'])
@endsection
