<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calidad extends Model
{
    use HasFactory;

    protected $table = 'calidad';
    protected $primaryKey = 'calidad_id';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'descripcion'
    ];
}
