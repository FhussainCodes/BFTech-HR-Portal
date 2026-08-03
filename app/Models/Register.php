<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'register';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'age', 
        'designation',
        'phone_number', 
        'city', 
        'country', 
        'password',
        'profile_image', 
        'confirm_password',
        'role', 
    ];


}
