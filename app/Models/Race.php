<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Race extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function incidents(): HasMany
    {
        return $this->hasMany(Incident::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }
}
