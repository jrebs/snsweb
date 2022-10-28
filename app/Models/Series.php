<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Series extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;

    /**
     * Get drivers registered to this series.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drivers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'series_drivers');
    }

    /**
     * Get directors of this series.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function directors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'series_directors');
    }
}
