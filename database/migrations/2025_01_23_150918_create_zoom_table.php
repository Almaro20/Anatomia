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
            $table->enum('zoom', ['x4', 'x10', 'x40', 'x100']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zooms');
    }
};
