<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('interpretacion', function (Blueprint $table) {
            $table->id('interpretacion_id');
            $table->text('texto');

            // Corregir la referencia a la tabla 'muestra' y 'users'
            $table->foreignId('muestra_id')->constrained('muestra', 'muestra_id'); // Referencia correcta para muestra_id
            $table->foreignId('userAutor_id')->constrained('users', 'id'); // Referencia correcta para user_id, ahora usa 'id' como clave primaria
        });
    }

    public function down()
    {
        Schema::dropIfExists('interpretacion');
    }
};
