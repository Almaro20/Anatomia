<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sede'; // Laravel ya lo infiere, pero lo puedes especificar

    protected $fillable = [
        'codigo',
        'nombre'
    ];
}
