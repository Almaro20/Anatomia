<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('interpretacion', function (Blueprint $table) {
            $table->id();
            $table->text('texto');

            // Corregir la referencia a la tabla 'muestra' y 'users'
            // Referencia correcta para muestra_id
            $table->foreign('muestra_id')->references('id')->on('muestra');
        });
    }

    public function down()
    {
        Schema::dropIfExists('interpretacion');
    }
};
