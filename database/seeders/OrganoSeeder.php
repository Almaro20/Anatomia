<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organo; // Asegúrate de tener el modelo Organo

class OrganoSeeder extends Seeder
{
    public function run()
    {
        Organo::insert([
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
            ['codigo' => 'BP', 'nombre' => 'Pulmón']
        ]);
    }
}
