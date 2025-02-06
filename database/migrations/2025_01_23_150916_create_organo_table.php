<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('organo', function (Blueprint $table) {
            $table->id(); 
            $table->string('codigo', 10)->unique();
            $table->string('nombre', 50);
            $table->engine = 'InnoDB'; // Asegurar InnoDB
        });

        // Insertar datos iniciales
        DB::table('organo')->insert([
            ['codigo' => 'BC', 'nombre' => 'Corazón'],
            ['codigo' => 'BB', 'nombre' => 'Bazo'],
            ['codigo' => 'BH', 'nombre' => 'Hígado'],
            ['codigo' => 'BF', 'nombre' => 'Feto'],
            ['codigo' => 'BES', 'nombre' => 'Estómago'],
            ['codigo' => 'BCB', 'nombre' => 'Cerebro'],
            ['codigo' => 'BR', 'nombre' => 'Riñón'],
            ['codigo' => 'BL', 'nombre' => 'Lengua'],
            ['codigo' => 'BU', 'nombre' => 'Útero'],
            ['codigo' => 'BO', 'nombre' => 'Ovario'],
            ['codigo' => 'BI', 'nombre' => 'Intestino'],
            ['codigo' => 'BTF', 'nombre' => 'Trompa de Falopio'],
            ['codigo' => 'BEF', 'nombre' => 'Esófago'],
            ['codigo' => 'BPA', 'nombre' => 'Páncreas'],
            ['codigo' => 'BT', 'nombre' => 'Testículo'],
            ['codigo' => 'BPI', 'nombre' => 'Piel'],
            ['codigo' => 'BP', 'nombre' => 'Pulmón'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('organo');
    }
};
