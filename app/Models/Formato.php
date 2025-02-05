<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    use HasFactory;

    protected $table = 'formato';
    protected $primaryKey = 'formato_id'; // Especificar clave primaria personalizada
    protected $fillable = ['nombre'];
}
