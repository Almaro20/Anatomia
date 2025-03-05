<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interpretacion extends Model
{
    use HasFactory;

    protected $table = 'interpretacion';

    protected $fillable = [
        'codigo',
        'descripcion'
    ];

    public $timestamps = false;

    // Relación con MuestrasInterpretacion
    public function muestrasInterpretaciones()
    {
        return $this->hasMany(MuestrasInterpretacion::class, 'idInterpretacion');
    }
}
