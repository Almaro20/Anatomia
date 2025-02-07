<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('muestras_interpretacion', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('calidad');
            $table->unsignedBigInteger('idMuestras');
            $table->unsignedBigInteger('idInterpretacion');

            // Verificar si las tablas existen antes de agregar claves foráneas
            if (Schema::hasTable('muestra')) {
                $table->foreign('idMuestras')->references('id')->on('muestra')->onDelete('cascade');
            }

            if (Schema::hasTable('interpretacion')) {
                $table->foreign('idInterpretacion')->references('id')->on('interpretacion')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muestras_interpretacion');
    }
};
