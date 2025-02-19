<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipo_estudio', function (Blueprint $table) {
            $table->id();  // Esto crea una columna 'id' como unsignedBigInteger automáticamente
            $table->string('nombre');
            $table->string('descripcion')->default('Descripción por defecto');
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_estudio');
    }
};
