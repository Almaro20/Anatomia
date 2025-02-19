<?php

// 2025_02_19_zooms_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('zooms', function (Blueprint $table) {
            $table->id();
            $table->string('zoom');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zooms');
    }
};
