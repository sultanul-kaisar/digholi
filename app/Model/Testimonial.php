<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['title', 'description', 'designation','company', 'image', 'status'];
}
