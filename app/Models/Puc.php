<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Puc extends Model
{
    use HasFactory;


    public function comprobanteLinea(): HasMany
    {
        return $this->hasMany(ComprobanteLinea::class);
    }
}
