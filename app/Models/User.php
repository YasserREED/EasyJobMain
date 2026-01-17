<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'isVerified',
    ];

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
        'password' => 'hashed',
    ];

    /**
     * Get the user's free CV service.
     */
    public function freeCv(): HasOne
    {
        return $this->hasOne(CvFree::class);
    }

    /**
     * Get all of the user's paid CV services.
     */
    public function cvServices(): HasMany
    {
        return $this->hasMany(CvService::class);
    }

    /**
     * Get the user's information.
     */
    public function userInfo(): HasOne
    {
        return $this->hasOne(UserInfo::class);
    }

    /**
     * Get all of the user's payments.
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Scope: Get users with their CVs (eager loaded).
     */
    public function scopeWithCvs($query)
    {
        return $query->with('cvServices', 'freeCv', 'userInfo');
    }
}
