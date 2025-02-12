<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organo extends Model
{
    use HasFactory;

    protected $table = 'organo'; 
    protected $primaryKey = 'organo_id';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'nombre'
    ];
}
