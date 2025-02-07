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
            $table->text('descripcion');
            $table->unsignedBigInteger('tipoEstudio_id'); // esta columna no debe ser nullable
            $table->foreign('tipoEstudio_id')->references('id')->on('tipo_estudio'); // asegúrate de que esto sea correcto
            $table->timestamps();
            $table->softDeletes();


            $table->engine = 'InnoDB';

        });

    }

    public function down()
    {
        Schema::dropIfExists('calidad');
    }
};
