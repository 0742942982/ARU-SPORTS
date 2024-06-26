<?php

namespace App\Models;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'gender', 'phone', 'registration_number', 'status', 'behavior', 'role', 'course', 'written_course', 'user_type', 'sport_type', 'profile_photo'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // Define the relationship with the UserType model
    public function types()
    {
        return $this->belongsTo(user_type::class, "user_type"); // Adjust 'user_type_id' as per your foreign key
    }

    // Define the relationship with the Course model
    public function cors()
    {
        return $this->belongsTo(Course::class, 'course'); // Adjust 'course_id' as per your foreign key
    }
}