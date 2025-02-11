<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    use HasFactory;

    protected $table = 'muestra';

    protected $fillable = [
        'codigo',
        'fechaEntrada',
        'tipoNaturaleza_id',
        'organo_id',
        'formato_id',
        'calidad_id',
        'sede_id',
        'descripcionMuestra'
    ];

    // Relaciones
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
        return $this->belongsTo(Calidad::class, 'calidad_id');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }
}
