<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_type extends Model
{
    use HasFactory;
    // Define the inverse relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class, 'user_type');
    }
}
