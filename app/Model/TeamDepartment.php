<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TeamDepartment extends Model
{
    protected $fillable = ['title', 'slug', 'parent_id', 'description', 'image', 'meta_title', 'meta_description', 'meta_keyword', 'status'];

    protected $appends = [
        'parent'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Model\TeamDepartment', 'parent_id', 'id');
    }

    public function childs() {
        return $this->hasMany('App\Model\TeamDepartment','parent_id','id') ;
    }

    public function getParentsAttribute()
    {
        $parents = collect([]);

        $parent = $this->parent;

        while(!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents;
    }

    public function teams()
    {
        return $this->hasMany('App\Model\Team');
    }
}
