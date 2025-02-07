@extends('layouts.panel')

@section('title')
Panel
@endsection

@section('content')
<!-- HEADER -->
<header class="relative bg-cover bg-center text-white text-center p-20" style="background-image: url('{{ asset('img/banner.png') }}');">
    <div class="absolute inset-0 bg-blue-700 opacity-60"></div>
    <div class="relative z-10">
        <h2 class="text-3xl font-bold">Genera y consulta informes fácilmente</h2>
        <p class="mt-4">Administra y visualiza todos tus informes en un solo lugar</p>
    </div>
</header>



@endsection

@vite(['resources/js/dashboard.js'])
