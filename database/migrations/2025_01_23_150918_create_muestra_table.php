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
            $table->enum('organo', ['B', 'BV', 'CB', 'CV', 'EX', 'O', 'E', 'ES', 'T', 'F']); // Tipos de muestra
            $table->text('descripcionMuestra');

            // Definición de claves foráneas con restricciones
            $table->foreignId('tipoNaturaleza_id')
                ->constrained('tipo_naturaleza', 'tipoNaturaleza_id')
                ->onDelete('cascade');
            $table->foreignId('formato_id')
                ->constrained('formato', 'formato_id')
                ->onDelete('cascade');
            $table->foreignId('calidad_id')
                ->constrained('calidad', 'calidad_id')
                ->onDelete('cascade');
            $table->foreignId('tipoEstudio_id')
                ->constrained('tipo_estudio', 'tipoEstudio_id')
                ->onDelete('cascade');
            $table->foreignId('sede_id')
                ->constrained('sede', 'sede_id')
                ->onDelete('cascade');
            $table->foreignId('userCreador_id')
                ->constrained('users', 'user_id')
                ->onDelete('cascade');

            $table->timestamps();

            // Asegurar que la tabla utilice el motor InnoDB para las claves foráneas
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('muestra');
    }
};
