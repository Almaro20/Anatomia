<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // La columna 'id' se crea por defecto
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();

            // Agregar las columnas 'created_at', 'updated_at', y 'email_verified_at'
            $table->timestamps(); // Esto agrega 'created_at' y 'updated_at'
            $table->timestamp('email_verified_at')->nullable(); // Esta es la columna que falta

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
