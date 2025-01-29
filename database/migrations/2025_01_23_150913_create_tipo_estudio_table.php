<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipo_estudio', function (Blueprint $table) {
            $table->id('tipoEstudio_id');
            $table->string('nombre', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_estudio');
    }
};
