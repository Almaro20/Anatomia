<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sede';
    protected $primaryKey = 'sede_id';

    protected $fillable = [
        'codigo',
        'nombre'
    ];
}
