<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InformacionFinanciera extends Model
{
    use HasFactory;
    
    public function Tercero(): BelongsTo
    {
        return $this->belongsTo(Tercero::class);
    }
}
 