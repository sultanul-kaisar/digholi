<?php

namespace App\Http\Controllers;

use App\Model\Blog;
use App\Model\BlogCategory;
use App\Model\Comment;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|blog view'],   ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|blog create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|blog edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|blog delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('backend.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::where('status', 'active')->get();
        return view('backend.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('image'))
        {
            $validatedData = $request->validate([
                'title'                => 'required',
                'slug'                 => 'required|unique:blogs',
                'name'                 => 'required',
                'blog_category_id'     => 'required|numeric',
                'description'          => 'required',
                'image'                => 'required|image|mimes:jpeg,jpg,png,gif|max:3072',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);
            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image)->resize(500, 400);

            $validatedData['image'] = $imagename;

            try {
                $blog = new Blog();
                $blog->create($validatedData);
                $path = public_path('storage/uploads/blogs/');

                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }

                $image->save($path.$imagename);

                return redirect()->route('blog.index')->with('successMessage', 'Blog successfully created!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('blog.index')->with('errorMessage', $ex->getMessage());
            }
        }else{

            $validatedData = $request->validate([
                'title'                => 'required',
                'slug'                 => 'required|unique:blogs',
                'name'                 => 'required',
                'blog_category_id'     => 'required|numeric',
                'description'          => '',
                'image'                => '',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);

            try {
                $blog = new Blog();
                $blog->create($validatedData);
                return redirect()->route('blog.index')->with('successMessage', 'Blog successfully created!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('blog.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::where('status', 'active')->get();
        return view('backend.blogs.edit', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if($request->has('image'))
        {
            $validatedData = $request->validate([
                'status'               => 'required',
                'title'                => 'required',
                'slug'                 => 'required',
                'name'                 => 'required',
                'blog_category_id'     => 'required|numeric',
                'description'          => 'required',
                'image'                => 'required|image|mimes:jpeg,jpg,png,gif|max:3072',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);
            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image)->resize(500, 400);

            $validatedData['image'] = $imagename;

            try {
                $oldImage = $blog->image;
                $blog->update($validatedData);
                $path = public_path('storage/uploads/blogs/');

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

                return redirect()->route('blog.edit', $blog->id)->with('successMessage', 'Blog successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('blog.index')->with('errorMessage', $ex->getMessage());
            }
        }else{

            $validatedData = $request->validate([
                'status'               => 'required',
                'title'                => 'required',
                'slug'                 => 'required',
                'name'                 => 'required',
                'project_category_id'   => 'required|numeric',
                'description'          => '',
                'image'                => '',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);

            try {
                $blog->update($validatedData);
                return redirect()->route('blog.edit', $blog->id)->with('successMessage', 'Blog successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('blog.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $oldImage = $blog->image;

        if($blog->delete())
        {
            $path = public_path('storage/uploads/blogs/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('blog.index')->with('successMessage', 'Blog successfully deleted!');
        }
    }

    public function addBlogComment(Request $request)
    {

        //VALIDATION
        $validatedData = $request->validate([
            'name'        => 'required',
            'body'        => 'required'
        ]);
        $blog_slug =  $request->blog_slug;
        $blog_id =  $request->blog_id;
        $blog = Blog::where('slug',$blog_slug)->first();

        if($blog != NULL)
        {
            try {

                $validatedData['commentable_id'] = $blog_id;
                $validatedData['commentable_type'] = 'App\Model\Blog';

                $comment = new Comment();
                $comment->create($validatedData);

                return redirect()->route('blog_view', $blog_slug)->with('successMessage', 'Comment successfully created!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('blog_view', $blog_slug)->with('errorMessage', $ex->getMessage());
            }

        }
        else{
            abort(404);
        }
    }
}
