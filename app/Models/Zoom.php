<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zoom extends Model
{
    use HasFactory;

    protected $fillable = ['imagen_id', 'zoom'];

    public function imagen()
    {
        return $this->belongsTo(Imagen::class);
    }
}