<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        "post_title",
        "post_description",
        "post_requirments",
        "post_benefits",
        "working_location",
        "catigory_name",
        "employee_id",
    ];
}
