<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Incident extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;

    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    public function drivers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'incidents_drivers');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
