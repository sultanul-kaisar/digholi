<?php

namespace App\CoverPhoto;

use Illuminate\Database\Eloquent\Model;

class ServicePhoto extends Model
{
    protected $fillable = ['title', 'image', 'status'];
}
