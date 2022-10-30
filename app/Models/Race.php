<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Get races that started within the last 48 hours
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeProtestable(Builder $query): Builder
    {
        return $query->whereBetween('date', [now()->subDays(2), now()]);
    }

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
