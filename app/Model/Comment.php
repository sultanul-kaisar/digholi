<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'body', 'commentable_id', 'commentable_type', 'status', 'read_status'];


    public function commentable()
    {
        return $this->morphTo();
    }
}
