<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Incident extends Model
{
    use HasFactory;

    /**
     * Get the race this incident took place in.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    /**
     * Get all the drivers involved in the incident.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drivers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'incidents_drivers');
    }
}
