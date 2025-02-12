<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('formato', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre');
            $table->string('codigo');
            $table->softDeletes();
            $table->timestamps();  // Esto agrega las columnas created_at y updated_at

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('formato');
    }
};

