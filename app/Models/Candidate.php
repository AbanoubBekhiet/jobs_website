<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Use this
class Candidate extends Authenticatable 
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
