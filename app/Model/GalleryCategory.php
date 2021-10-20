<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable = ['title', 'slug', 'parent_id', 'description', 'image', 'meta_title', 'meta_description', 'meta_keyword', 'status'];

    protected $appends = [
        'parent'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Model\GalleryCategory', 'parent_id', 'id');
    }

    public function childs() {
        return $this->hasMany('App\Model\GalleryCategory','parent_id','id') ;
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
                if (is_file(public_path('storage/uploads/gallery-categories/'.$subChild->image))) {
                    unlink(public_path('storage/uploads/gallery-categories/'.$subChild->image));
                }
                SELF::deleteGrandChieldImages($subChild->id);
            }
        }

    }

    public function galleries()
    {
        return $this->hasMany('App\Model\Gallery');
    }

    // EVENT FOR DELETING ASSOCIATED IMAGE WITH BLOG UNDER DELETED CATEGORY AND IMAGE WITH CHILD CATEGORY UNDER A CATEGORY
    protected static function boot() {
        parent::boot();

        static::deleting(function($GalleryCategory) {
            if($GalleryCategory->galleries->count() > 0)
            {
                $galleries = $GalleryCategory->galleries;
                foreach($galleries as $gallery)
                {
                    if (is_file(public_path('storage/uploads/galleries/'.$galleries->image))) {
                        unlink(public_path('storage/uploads/galleries/'.$galleries->image));
                    }
                }
            }

            // do all of the logic for deleting child categories and files here
            if($GalleryCategory->childs->count() > 0)
            {
                $childs = $GalleryCategory->childs;
                foreach($childs as $child)
                {
                    if (is_file(public_path('storage/uploads/gallery-categories/'.$child->image))) {
                        unlink(public_path('storage/uploads/gallery-categories/'.$child->image));
                    }

                    $getChieldData = SELF::deleteGrandChieldImages($child->id);
                }
            }
        });
    }
}
