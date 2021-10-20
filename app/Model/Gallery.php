<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'slug', 'gallery_category_id', 'image', 'description', 'status'];

    public function gallery_category()
    {
        return $this->belongsTo('App\Model\GalleryCategory');
    }

    public function comments()
    {
        return $this->morphMany('App\Model\Comment', 'commentable');
    }
}
