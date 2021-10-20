<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class BlogCategory extends Model
{
    protected $fillable = ['title', 'slug', 'parent_id', 'description', 'image', 'meta_title', 'meta_description', 'meta_keyword', 'status'];

    protected $appends = [
        'parent'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Model\BlogCategory', 'parent_id', 'id');
    }

    public function childs() {
        return $this->hasMany('App\Model\BlogCategory','parent_id','id') ;
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
                if (is_file(public_path('storage/uploads/blog-categories/'.$subChild->image))) {
                    unlink(public_path('storage/uploads/blog-categories/'.$subChild->image));
                }
                SELF::deleteGrandChieldImages($subChild->id);
            }
        }

    }

    public function blogs()
    {
        return $this->hasMany('App\Model\Blog');
    }

    // EVENT FOR DELETING ASSOCIATED IMAGE WITH BLOG UNDER DELETED CATEGORY AND IMAGE WITH CHILD CATEGORY UNDER A CATEGORY
    protected static function boot() {
        parent::boot();

        static::deleting(function($BlogCategory) {
            if($BlogCategory->blogs->count() > 0)
            {
                $blogs = $BlogCategory->blogs;
                foreach($blogs as $blog)
                {
                    if (is_file(public_path('storage/uploads/blogs/'.$blog->image))) {
                        unlink(public_path('storage/uploads/blogs/'.$blog->image));
                    }
                }
            }

            // do all of the logic for deleting child categories and files here
            if($BlogCategory->childs->count() > 0)
            {
                $childs = $BlogCategory->childs;
                foreach($childs as $child)
                {
                    if (is_file(public_path('storage/uploads/blog-categories/'.$child->image))) {
                        unlink(public_path('storage/uploads/blog-categories/'.$child->image));
                    }

                    $getChieldData = SELF::deleteGrandChieldImages($child->id);
                }
            }
        });
    }
}
