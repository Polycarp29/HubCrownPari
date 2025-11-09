<?php

namespace App\Models\Defaults;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function users(){
        return $this->belongsMany(User::class, 'user_types_pivots', 'user_id', 'user_types_id');
    }
}
