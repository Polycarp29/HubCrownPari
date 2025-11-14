<?php

namespace App\Models\User\Profiles;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'city',
        'state',
        'postal_code',
        'country',
        'address_line',
        'profile_avatar',
        'birth_date',
        'created_at',
        'updated_at',
    ];




    /**
     * Relationships
     */


    public function userprofile(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
