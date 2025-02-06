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
            $table->string('codigo', 50);
            $table->date('fecha');
            $table->unsignedBigInteger('tipo_naturaleza_id');
            $table->unsignedBigInteger('organo_id');
            $table->unsignedBigInteger('formato_id');
            $table->unsignedBigInteger('calidad_id');
            $table->unsignedBigInteger('sede_id');
            $table->text('descripcionMuestra')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';

            // Claves foráneas
            $table->foreign('tipo_naturaleza_id')->references('id')->on('tipo_naturaleza')->onDelete('cascade');
            $table->foreign('organo_id')->references('id')->on('organo')->onDelete('cascade');
            $table->foreign('formato_id')->references('id')->on('formato')->onDelete('cascade');
            $table->foreign('calidad_id')->references('id')->on('calidad')->onDelete('cascade');
            $table->foreign('sede_id')->references('id')->on('sede')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('muestra');
    }
};
