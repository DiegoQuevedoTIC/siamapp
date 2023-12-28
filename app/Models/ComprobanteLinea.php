<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteLinea extends Model
{
    use HasFactory;

    protected $fillable = ['pucs_id', 'tercero_registro', 'descripcion_linea', 'debito', 'credito'];

    public function comprobante()
    {
        return $this->belongsTo(Comprobante::class);
    }
}
