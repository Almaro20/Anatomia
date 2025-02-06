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
            $table->id('muestra_id'); // Usamos el id predeterminado como primary key
            $table->string('codigo', 50);
            $table->date('fechaEntrada');
            $table->enum('organo', ['B', 'BV', 'CB', 'CV', 'EX', 'O', 'E', 'ES', 'T', 'F']);
            $table->text('descripcionMuestra');

            // Definir las claves foráneas con unsignedBigInteger y luego referenciarlas
            $table->unsignedBigInteger('tipoNaturaleza_id');
            $table->unsignedBigInteger('formato_id');
            $table->unsignedBigInteger('calidad_id');
            $table->unsignedBigInteger('tipoEstudio_id');
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('userCreador_id');

            // Establecer las relaciones de las claves foráneas
            $table->foreign('tipoNaturaleza_id')->references('tipoNaturaleza_id')->on('tipo_naturaleza')->onDelete('cascade');
            $table->foreign('formato_id')->references('formato_id')->on('formato')->onDelete('cascade');
            $table->foreign('calidad_id')->references('calidad_id')->on('calidad')->onDelete('cascade');
            $table->foreign('tipoEstudio_id')->references('tipoEstudio_id')->on('tipo_estudio')->onDelete('cascade');
            $table->foreign('sede_id')->references('sede_id')->on('sede')->onDelete('cascade');
            $table->foreign('userCreador_id')->references('id')->on('users')->onDelete('cascade');

            // Establecer el motor InnoDB
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('muestra');
    }
};
