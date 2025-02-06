<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calidad', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('descripcion');
            $table->engine = 'InnoDB';

            $table->foreignId('tipoEstudio_id')->references('id')->on('tipo_estudio');

        });
    }

    public function down()
    {
        Schema::dropIfExists('calidad');
    }
};
