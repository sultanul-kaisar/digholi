<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $fillable = ['title', 'slug', 'parent_id', 'description', 'image', 'meta_title', 'meta_description', 'meta_keyword', 'status'];

    protected $appends = [
        'parent'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Model\ProjectCategory', 'parent_id', 'id');
    }

    public function childs() {
        return $this->hasMany('App\Model\ProjectCategory','parent_id','id') ;
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


    // GRAND CHIELD CATEGORY FILES DELETION
    public static function deleteGrandChieldImages($grandChield)
    {
        $getChieldData = SELF::find($grandChield);

        if($getChieldData->childs->count() > 0)
        {
            $subChilds = $getChieldData->childs;

            foreach($subChilds as $subChild)
            {
                if (is_file(public_path('storage/uploads/project-categories/'.$subChild->image))) {
                    unlink(public_path('storage/uploads/project-categories/'.$subChild->image));
                }
                SELF::deleteGrandChieldImages($subChild->id);
            }
        }

    }

    public function projects()
    {
        return $this->hasMany('App\Model\Project');
    }

    // EVENT FOR DELETING ASSOCIATED IMAGE WITH BLOG UNDER DELETED CATEGORY AND IMAGE WITH CHILD CATEGORY UNDER A CATEGORY
    protected static function boot() {
        parent::boot();

        static::deleting(function($ProjectCategory) {
            if($ProjectCategory->projects->count() > 0)
            {
                $projects = $ProjectCategory->projects;
                foreach($projects as $project)
                {
                    if (is_file(public_path('storage/uploads/projects/'.$project->image))) {
                        unlink(public_path('storage/uploads/projects/'.$project->image));
                    }
                }
            }

            // do all of the logic for deleting child categories and files here
            if($ProjectCategory->childs->count() > 0)
            {
                $childs = $ProjectCategory->childs;
                foreach($childs as $child)
                {
                    if (is_file(public_path('storage/uploads/project-categories/'.$child->image))) {
                        unlink(public_path('storage/uploads/project-categories/'.$child->image));
                    }

                    $getChieldData = SELF::deleteGrandChieldImages($child->id);
                }
            }
        });
    }
}
