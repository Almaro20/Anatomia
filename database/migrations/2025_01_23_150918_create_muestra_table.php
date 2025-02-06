<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('muestra', function (Blueprint $table) {
            $table->id(); // Clave primaria correcta
            $table->string('codigo');
            $table->date('fechaEntrada');
            $table->enum('organo', ['B', 'BV', 'CB', 'CV', 'EX', 'O', 'E', 'ES', 'T', 'F']);
            $table->text('descripcionMuestra');

            // Definir claves foráneas correctamente
            $table->foreignId('tipoNaturaleza_id')->constrained('tipo_naturaleza');
            $table->foreignId('formato_id')->constrained('formato'); // Clave corregida
            $table->foreignId('calidad_id')->constrained('calidad');
            $table->foreignId('sede_id')->constrained('sede');
            $table->foreignId('userCreador_id')->constrained('users');

            // Establecer el motor InnoDB
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('muestra');
    }
};
