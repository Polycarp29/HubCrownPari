<?php

namespace App\Models\User\Profiles;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'business_name',
        'whatsapp',
        'city',
        'business_logo',
        'state',
        'zip_code',
        'address_line_1',
        'business_number',
        'business_email',
        'company_website',
        'created_at',
        'updated_at',
    ];


    public function businessprofile(){
        return $this->belongTo(User::class, 'user_id');
    }


}
