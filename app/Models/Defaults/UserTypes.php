<?php

namespace App\Models\Defaults;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_type_name',
        'description',
    ];



    /**
     * Relationships
     */
}
