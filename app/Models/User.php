<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Series::class, 'series_drivers');
    }

    public function directorships(): BelongsToMany
    {
        return $this->belongsToMany(Series::class, 'series_directors');
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function incidents(): BelongsToMany
    {
        return $this->belongsToMany(Incident::class, 'incidents_drivers');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
