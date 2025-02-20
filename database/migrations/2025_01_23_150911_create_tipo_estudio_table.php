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
            $table->string('codigo')->nullable();
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::table('tipo_estudio', function (Blueprint $table) {
            $table->dropColumn('codigo');
        });
    }
};
