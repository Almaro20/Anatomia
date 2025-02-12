<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id(); // La columna 'id' se crea por defecto
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();

            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();



        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
};
