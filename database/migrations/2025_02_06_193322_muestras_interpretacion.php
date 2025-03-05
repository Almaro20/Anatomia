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
            $table->id();
            $table->foreignId('idMuestras')->constrained('muestra');
            $table->foreignId('idInterpretacion')->constrained('interpretacion');
            $table->timestamps();
            $table->softDeletes();
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
