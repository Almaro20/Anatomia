<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('muestra', function (Blueprint $table) {
            // Definir la columna primaria
            $table->id('muestra_id');
            $table->string('codigo', 50);
            $table->date('fechaEntrada');
            $table->enum('organo', ['B', 'BV', 'CB', 'CV', 'EX', 'O', 'E', 'ES', 'T', 'F']);
            $table->text('descripcionMuestra');


            $table->foreignId('tipoNaturaleza_id');
            $table->foreignId('formato_id');
            $table->foreignId('calidad_id');
            $table->foreignId('tipoEstudio_id');
            $table->foreignId('sede_id');
            $table->foreignId('userCreador_id');

            $table->foreign('tipoNaturaleza_id')->references('tipoNaturaleza_id')->on('tipo_naturaleza')->onDelete('cascade');
            $table->foreign('formato_id')->references('formato_id')->on('formato')->onDelete('cascade');
            $table->foreign('calidad_id')->references('calidad_id')->on('calidad')->onDelete('cascade');
            $table->foreign('tipoEstudio_id')->references('tipoEstudio_id')->on('tipo_estudio')->onDelete('cascade');
            $table->foreign('sede_id')->references('sede_id')->on('sede')->onDelete('cascade');
            $table->foreign('userCreador_id')->references('user_id')->on('users')->onDelete('cascade');



            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('muestra');
    }
};
