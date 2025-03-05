<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstudio extends Model
{
    use HasFactory;

    protected $table = 'tipo_estudio';

    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function tipoNaturalezas()
    {
        return $this->hasMany(TipoNaturaleza::class, 'tipoEstudio_id');
    }
}
