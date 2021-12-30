<?php

namespace App\CoverPhoto;

use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    protected $fillable = ['title', 'image', 'status'];
}
