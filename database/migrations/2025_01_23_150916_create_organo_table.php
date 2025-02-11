<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('organo', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nombre');
            $table->engine = 'InnoDB';
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('organo');
    }
};
