<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagen extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'imagenes';
    
    protected $fillable = [
        'url',
        'zoom_id'
    ];

    protected $with = ['zoom'];

    // Deshabilitar las marcas de tiempo
    public $timestamps = false;

    public function zoom()
    {
        return $this->belongsTo(Zoom::class);
    }

    public function muestra()
    {
        return $this->hasOne(Muestra::class);
    }
}