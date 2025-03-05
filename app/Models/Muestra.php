<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    use HasFactory;

    protected $table = 'muestra';

    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'fechaEntrada',
        'tipoNaturaleza_id',
        'tipoEstudio_id',
        'organo',
        'formato_id',
        'calidad_id',
        'sede_id',
        'user_id',
        'descripcionMuestra',
        'imagen_id'
    ];


    // Relaciones
    public function tipoEstudio()
    {
        return $this->belongsTo(TipoEstudio::class, 'tipoEstudio_id');
    }

    public function tipoNaturaleza()
    {
        return $this->belongsTo(TipoNaturaleza::class, 'tipoNaturaleza_id');
    }

    public function organo()
    {
        return $this->belongsTo(Organo::class, 'organo_id');
    }

    public function formato()
    {
        return $this->belongsTo(Formato::class, 'formato_id');
    }

    public function calidad()
    {
        return $this->belongsTo(Calidad::class, 'calidad_id', 'id');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function interpretaciones()
    {
        return $this->hasMany(MuestrasInterpretacion::class, 'idMuestras');
    }

    public function imagen()
    {
        return $this->belongsTo(Imagen::class, 'imagen_id');
    }
}
