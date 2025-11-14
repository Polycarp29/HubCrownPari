<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Defaults\UserTypes;
use App\Models\User\Profiles\BusinessProfile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'password',
        'otp',
        'status',
        'is_verified',
        'failed_logins',
        'locked_until',
        'google_id',
        'otp_expires_at',
        'last_otp_sent_at',
        'last_seen_at',
        'email_verified_at',
        'remember_token',
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
        'otp_expires_at' => 'datetime',
        'last_otp_sent_at' => 'datetime',
        'last_seen_at' => 'datetime',
    ];


    /**
     * Relationships
     */

    public function usertypes()
    {
        return  $this->belongsToMany(UserTypes::class, 'user_types_pivots', 'user_types_id', 'user_id');
    }


    public function profile(){
        return $this->hasOne(User::class, 'user_id');
    }

    public function business(){
        return $this->hasOne(BusinessProfile::class, 'user_id');
    }
}
