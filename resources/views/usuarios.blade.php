@extends('layouts.panel')

@section('title')
Panel
@endsection

@section('content')


<div class="container1 mt-10">
    <div class="row1">
        <!-- Aquí se insertarán dinámicamente las muestras -->
    </div>
</div>



<!-- CSS de Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- JS de Toastr y jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@vite( ['resources/js/usuarios.js'])
@endsection

