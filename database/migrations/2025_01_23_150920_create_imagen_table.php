<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('imagen', function (Blueprint $table) {
            $table->id();
            $table->string('ruta');
            $table->string('zoom');
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('imagen');
    }
};
