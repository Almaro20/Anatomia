<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipo_naturaleza', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nombre');
            $table->foreignId('tipoEstudio_id')->constrained('tipo_estudio')->onDelete('cascade');
            $table->softDeletes();



            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::table('tipo_naturaleza', function (Blueprint $table) {
            $table->dropForeign(['tipoEstudio_id']);
        });

        Schema::dropIfExists('tipo_naturaleza');
    }
};
