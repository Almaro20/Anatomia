<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('imagen', function (Blueprint $table) {
            $table->id('imagen_id');
            $table->string('ruta', 200);
            $table->string('zoom', 10);
            $table->foreignId('muestra_id')->constrained('muestra', 'muestra_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagen');
    }
};
