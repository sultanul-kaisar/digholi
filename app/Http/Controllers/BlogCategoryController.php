<?php

namespace App\Http\Controllers;

use App\Model\BlogCategory;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class BlogCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|blog category view'], ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|blog category create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|blog category edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|blog category delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategories = BlogCategory::all();

        return view('admin.blog-categories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::where('status', 'active')->get();
        return view('admin.blog-categories.create', compact('categories'));
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
                'slug'              => 'required|unique:blog_categories',
                'description'       => '',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => ''
            ]);

            try {
                $blogCategory = new BlogCategory;
                $blogCategory->create($validatedData);
                return redirect()->route('blog-category.index')->with('successMessage', 'Blog category successfully created!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('blog-category.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:blog_categories',
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
                $blogCategory = new BlogCategory;
                if($blogCategory->create($validatedData))
                {
                    $path = public_path('storage/uploads/blog-categories/');

                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $image->save($path.$imagename);
                    return redirect()->route('blog-category.index')->with('successMessage', 'Blog category successfully created!');
                }

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('blog-category.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blogCategory)
    {
        $categories = BlogCategory::where('status', 'active')->get();
        return view('admin.blog-categories.edit', compact('categories', 'blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        if(!$request->has('image')){
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:blog_categories,slug,'.$blogCategory->id,
                'description'       => '',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => '',
                'status'            => 'required'
            ]);

            try {
                $blogCategory->update($validatedData);
                return redirect()->route('blog-category.edit', $blogCategory->id)->with('successMessage', 'Blog category successfully updated!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('blog-category.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:blog_categories,slug,'.$blogCategory->id,
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

            $oldImage = $blogCategory->image;
            try {
                if($blogCategory->update($validatedData))
                {
                    $path = public_path('storage/uploads/blog-categories/');

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
                    return redirect()->route('blog-category.edit', $blogCategory->id)->with('successMessage', 'Blog category successfully updated!');
                }

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('blog-category.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blogCategory)
    {
        $oldImage = $blogCategory->image;

        if($blogCategory->delete())
        {
            $path = public_path('storage/uploads/blog-categories/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('blog-category.index')->with('successMessage', 'Blog category successfully deleted!');
        }
    }
}
