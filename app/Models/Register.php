<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
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
        'confrim_password', 
    ];


}
