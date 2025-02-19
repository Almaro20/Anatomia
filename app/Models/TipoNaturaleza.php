<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoNaturaleza extends Model
{
    use HasFactory;

    protected $table = 'tipo_naturaleza';
    
    // Eliminar esta línea, ya que Laravel usa 'id' por defecto
    // protected $primaryKey = 'tipoNaturaleza_id'; 

    public $timestamps = false;

    protected $fillable = [
        'codigo', 'nombre', 'tipoEstudio_id'  // Asegúrate de llenar estos campos
    ];

    public function muestras()
    {
        return $this->hasMany(Muestra::class, 'tipoNaturaleza_id');
    }

    // Relación con TipoEstudio
    public function tipoEstudio()
    {
        return $this->belongsTo(TipoEstudio::class, 'tipoEstudio_id');
    }
}
