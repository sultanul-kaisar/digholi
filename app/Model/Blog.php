<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'name', 'blog_category_id', 'description', 'image', 'status'];

    public function blog_category(){
        return $this->belongsTo('App\Model\BlogCategory');
    }

    /**
     * Get all of the post's Comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Model\Comment', 'commentable');
    }
}
