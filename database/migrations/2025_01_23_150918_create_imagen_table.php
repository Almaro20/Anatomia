<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();  // ID de la imagen
            $table->string('url');  // URL de Cloudinary
            $table->foreignId('zoom_id')->constrained('zooms')->onDelete('cascade')->nullable();;

            $table->softDeletes();  // Para eliminar imágenes lógicamente
            $table->timestamps();   // Para crear los timestamps de la imagen
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagenes');
    }
};
