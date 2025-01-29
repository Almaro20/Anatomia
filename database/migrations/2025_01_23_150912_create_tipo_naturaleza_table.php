<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipo_naturaleza', function (Blueprint $table) {
            $table->id('tipoNaturaleza_id');
            $table->string('codigo', 10);
            $table->string('nombre', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_naturaleza');
    }
};
