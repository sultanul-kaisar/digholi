<?php

namespace App\Http\Controllers;

use App\Model\GalleryCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class GalleryCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|gallery category view'], ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|gallery category create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|gallery category edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|gallery category delete'], ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleryCategories = GalleryCategory::all();

        return view('admin.gallery-categories.index', compact('galleryCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = GalleryCategory::where('status', 'active')->get();
        return view('admin.gallery-categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->has('image')){
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:gallery_categories',
                'description'       => '',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => ''
            ]);

            try {
                $galleryCategory = new GalleryCategory;
                $galleryCategory->create($validatedData);
                return redirect()->route('gallery-category.index')->with('successMessage', 'Gallery category successfully created!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('gallery-category.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:gallery_categories',
                'description'       => '',
                'image'             => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => ''
            ]);

            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image);

            $validatedData['image'] = $imagename;

            try {
                $galleryCategory = new GalleryCategory;
                if($galleryCategory->create($validatedData))
                {
                    $path = public_path('storage/uploads/gallery-categories/');

                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $image->save($path.$imagename);
                    return redirect()->route('gallery-category.index')->with('successMessage', 'Gallery category successfully created!');
                }

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('gallery-category.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryCategory $galleryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryCategory $galleryCategory)
    {
        $categories = GalleryCategory::where('status', 'active')->get();
        return view('admin.gallery-categories.edit', compact('categories', 'galleryCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        if(!$request->has('image')){
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:gallery_categories,slug,'.$galleryCategory->id,
                'description'       => '',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => '',
                'status'            => 'required'
            ]);

            try {
                $galleryCategory->update($validatedData);
                return redirect()->route('gallery-category.edit', $galleryCategory->id)->with('successMessage', 'Gallery category successfully updated!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('gallery-category.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:gallery_categories,slug,'.$galleryCategory->id,
                'description'       => '',
                'image'             => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => '',
                'status'            => 'required'
            ]);

            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image);

            $validatedData['image'] = $imagename;

            $oldImage = $galleryCategory->image;
            try {
                if($galleryCategory->update($validatedData))
                {
                    $path = public_path('storage/uploads/gallery-categories/');

                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }

                    if($oldImage != 'default.jpg')
                    {
                        if (is_file($path.$oldImage)) {
                            unlink($path.$oldImage);
                        }
                    }
                    $image->save($path.$imagename);
                    return redirect()->route('gallery-category.edit', $galleryCategory->id)->with('successMessage', 'Gallery category successfully updated!');
                }

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('gallery-category.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryCategory $galleryCategory)
    {
        $oldImage = $galleryCategory->image;

        if($galleryCategory->delete())
        {
            $path = public_path('storage/uploads/gallery-categories/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('gallery-category.index')->with('successMessage', 'Gallery category successfully deleted!');
        }
    }
}
