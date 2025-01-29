<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('interpretacion', function (Blueprint $table) {
            $table->id('interpretacion_id');
            $table->text('texto');
            $table->foreignId('muestra_id')->constrained('muestra', 'muestra_id');
            $table->foreignId('userAutor_id')->constrained('users', 'user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interpretacion');
    }
};
