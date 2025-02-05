<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calidad', function (Blueprint $table) {
            $table->id('calidad_id');
            $table->string('codigo', 10)->unique();
            $table->string('descripcion', 255); 
        });

        // Insertar valores iniciales
        DB::table('calidad')->insert([
            ['codigo' => 'C.1', 'descripcion' => 'Toma válida para examen.'],
            ['codigo' => 'C.2', 'descripcion' => 'Toma válida para examen aunque limitada por ausencia de células endocervicales/zona de transición.'],
            ['codigo' => 'C.3', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.'],
            ['codigo' => 'C.4', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de células.'],
            ['codigo' => 'C.5', 'descripcion' => 'Toma válida para examen aunque limitada por intensa citolisis.'],
            ['codigo' => 'C.6', 'descripcion' => 'Toma válida para examen aunque limitada por otra condición.'],
            ['codigo' => 'C.7', 'descripcion' => 'Toma no valorable por desecación.'],
            ['codigo' => 'C.8', 'descripcion' => 'Toma no valorable por ausencia de células.'],
            ['codigo' => 'C.9', 'descripcion' => 'Toma no valorable por otra condición.']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('calidad');
    }
};
