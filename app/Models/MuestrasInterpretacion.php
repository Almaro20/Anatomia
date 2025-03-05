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
        'calidad',
        'idMuestras',
        'idInterpretacion'
    ];

    public function muestra()
    {
        return $this->belongsTo(Muestra::class, 'idMuestras');
    }

    public function interpretacion()
    {
        return $this->belongsTo(Interpretacion::class, 'idInterpretacion');
    }
}
