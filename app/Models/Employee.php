<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Use this

class Employee extends Authenticatable
{
    use HasFactory;
    protected $fillable=[
        "name",
        "age",
        "email",
        "phone_number",
        "password",
        "gender",
    ];
}
