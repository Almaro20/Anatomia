<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MuestrasInterpretacion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'muestras_interpretacion';

    protected $fillable = [
        'idMuestras',
        'idInterpretacion'
    ];

    protected $dates = ['deleted_at'];

    // Relación con Muestra
    public function muestra()
    {
        return $this->belongsTo(Muestra::class, 'idMuestras', 'id');
    }

    // Relación con Interpretacion
    public function interpretacion()
    {
        return $this->belongsTo(Interpretacion::class, 'idInterpretacion', 'id');
    }
}
