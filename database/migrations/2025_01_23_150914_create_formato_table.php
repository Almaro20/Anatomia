<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('formato', function (Blueprint $table) {
            $table->id(); // Se corrige para usar 'id' como clave primaria
            $table->string('nombre');
            $table->string('codigo');

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('formato');
    }
};
