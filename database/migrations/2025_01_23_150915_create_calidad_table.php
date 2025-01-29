<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calidad', function (Blueprint $table) {
            $table->id('calidad_id');
            $table->string('nombre', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calidad');
    }
};
