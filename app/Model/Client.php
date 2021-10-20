<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'image', 'url', 'status'];
}
