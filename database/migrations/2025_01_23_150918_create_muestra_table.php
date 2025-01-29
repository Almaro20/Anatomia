<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('muestra', function (Blueprint $table) {
            $table->id('muestra_id');
            $table->string('codigo', 50);
            $table->date('fechaEntrada');
            $table->string('organo', 100);
            $table->text('descripcionMuestra');
            $table->foreignId('tipoNaturaleza_id')->constrained('tipo_naturaleza', 'tipoNaturaleza_id');
            $table->foreignId('formato_id')->constrained('formato', 'formato_id');
            $table->foreignId('calidad_id')->constrained('calidad', 'calidad_id');
            $table->foreignId('tipoEstudio_id')->constrained('tipo_estudio', 'tipoEstudio_id');
            $table->foreignId('sede_id')->constrained('sede', 'sede_id');
            $table->foreignId('userCreador_id')->constrained('users', 'user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('muestra');
    }
};
