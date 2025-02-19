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
            $table->string('url');  // Cloudinary
            $table->softDeletes();  
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagenes');
    }
};