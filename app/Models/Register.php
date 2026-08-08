<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Register extends Model
{
    use HasFactory, Notifiable;
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
