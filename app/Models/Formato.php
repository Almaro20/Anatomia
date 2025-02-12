<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    use HasFactory;
    protected $table = 'formato'; // Laravel ya lo infiere, pero lo puedes especificar


    // Desactivar el uso de timestamps
    public $timestamps = false;

    // Definir los campos que se pueden rellenar
    protected $fillable = ['codigo', 'nombre'];
}
