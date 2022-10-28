<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, Auditable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use AuditableTrait;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the series in which this user is registered as a driver.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Series::class, 'series_drivers');
    }

    /**
     * Get all of the series this user directs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function directorships(): BelongsToMany
    {
        return $this->belongsToMany(Series::class, 'series_directors');
    }
}
