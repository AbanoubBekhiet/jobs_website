<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $fillable=[
        "candidate_id",
        "image_path",
        "cv_path",
        "education",
        "candidate_address",
    ];
}
