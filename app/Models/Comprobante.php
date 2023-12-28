<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comprobante extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_documento_contables_id', 'n_documento', 'tercero_comprobante', 'is_plantilla', 'descripcion_comprobante', 'clase_comprobante_origen'];

    public function comprobanteLinea()
    {
        return $this->HasMany(ComprobanteLinea::class);
    }

    public function tipoDocumentoContable()
    {
        return $this->belongsTo(TipoDocumentoContable::class);
    }
}
