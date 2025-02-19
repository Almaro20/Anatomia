<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    public function zooms()
    {
        return $this->hasMany(Zoom::class);
    }

    public function imagenable()
    {
        return $this->morphTo();
    }
}