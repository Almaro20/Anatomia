<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('muestra', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->date('fechaEntrada');
            $table->string('organo')->nullable();
            $table->text('descripcionMuestra');
            $table->softDeletes();

            // Agregar los timestamps
            $table->timestamps();

            $table->foreignId('tipoEstudio_id')->constrained('tipo_estudio');
            $table->foreignId('tipoNaturaleza_id')->constrained('tipo_naturaleza');
            $table->foreignId('formato_id')->constrained('formato');
            $table->foreignId('calidad_id')->constrained('calidad')->nullable();
            $table->foreignId('sede_id')->constrained('sede');
            $table->foreignId('user_id')->constrained('user')->nullable();
            $table->foreignId('imagen_id')->nullable()->constrained('imagenes')->nullable();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('muestra');
    }
};
