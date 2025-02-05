<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoNaturaleza extends Model
{
    use HasFactory;

    protected $table = 'tipo_naturaleza';

    protected $primaryKey = 'tipoNaturaleza_id';

    public $timestamps = false;

    protected $fillable = [
    ];

    public function muestras()
    {
        return $this->hasMany(Muestra::class, 'tipoNaturaleza_id');
    }
}
