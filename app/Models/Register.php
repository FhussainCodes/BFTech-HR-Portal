<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'age', 
        'phone_number', 
        'password', 
        'confrim_password', 
        'city', 
        'country', 
        'designation'
    ];


}
