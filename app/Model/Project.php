<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'slug', 'project_category_id', 'description', 'image', 'url', 'status'];

    public function project_category()
    {
        return $this->belongsTo('App\Model\ProjectCategory');
    }

    public function comments()
    {
        return $this->morphMany('App\Model\Comment', 'commentable');
    }
}
