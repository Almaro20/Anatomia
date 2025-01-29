<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('formato', function (Blueprint $table) {
            $table->id('formato_id');
            $table->string('nombre', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formato');
    }
};
