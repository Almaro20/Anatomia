<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    use HasFactory;

    protected $table = 'muestra'; // Nombre de la tabla en la BD

    protected $primaryKey = 'muestra_id'; // Clave primaria personalizada

    public $timestamps = false; // Si la tabla no tiene created_at y updated_at

    protected $fillable = [
        'codigo',              // Código de la muestra
        'fecha',               // Fecha de entrada
        'organo_id',           // Relación con Organo
        'descripcionMuestra',  // Descripción de la muestra
        'tipoNaturaleza_id',   // Relación con TipoNaturaleza
        'formato_id',          // Relación con Formato
        'calidad_id',          // Relación con Calidad
        'tipoEstudio_id',      // Relación con TipoEstudio
        'sede_id',             // Relación con Sede
        'userCreador_id',      // Relación con el usuario que creó la muestra
    ];

    // Relación con TipoNaturaleza
    public function tipoNaturaleza()
    {
        return $this->belongsTo(TipoNaturaleza::class, 'tipoNaturaleza_id');
    }

    // Relación con Formato
    public function formato()
    {
        return $this->belongsTo(Formato::class, 'formato_id');
    }

    // Relación con Calidad
    public function calidad()
    {
        return $this->belongsTo(Calidad::class, 'calidad_id');
    }

    // Relación con TipoEstudio
    public function tipoEstudio()
    {
        return $this->belongsTo(TipoEstudio::class, 'tipoEstudio_id');
    }

    // Relación con Sede
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    // Relación con el Usuario Creador
    public function creador()
    {
        return $this->belongsTo(User::class, 'userCreador_id');
    }

    // Relación con Organo (Nuevo)
    public function organo()
    {
        return $this->belongsTo(Organo::class, 'organo_id');
    }
}
