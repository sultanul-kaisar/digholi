<?php

namespace App\Http\Controllers;

use App\Model\Gallery;
use App\Model\GalleryCategory;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class GalleryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|gallery view'],   ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|gallery create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|gallery edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|gallery delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();

        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = GalleryCategory::where('status', 'active')->get();
        return view('admin.galleries.create', compact('categories'));
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
                'slug'                 => 'required|unique:teams',
                'gallery_category_id'   => 'required|numeric',
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
                $gallery = new Gallery();
                $gallery->create($validatedData);
                $path = public_path('storage/uploads/galleries/');

                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }

                $image->save($path.$imagename);

                return redirect()->route('gallery.index')->with('successMessage', 'Gallery successfully created!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('gallery.index')->with('errorMessage', $ex->getMessage());
            }
        }else{

            $validatedData = $request->validate([
                'title'                => 'required',
                'slug'                 => 'required|unique:teams',
                'gallery_category_id'  => 'required|numeric',
                'description'          => 'required',
                'image'                => 'required|image|mimes:jpeg,jpg,png,gif|max:3072',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);

            try {
                $gallery = new Gallery();
                $gallery->create($validatedData);
                return redirect()->route('gallery.index')->with('successMessage', 'Gallery successfully created!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('gallery.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $categories = GalleryCategory::where('status', 'active')->get();
        return view('admin.galleries.edit', compact('categories', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        if($request->has('image'))
        {
            $validatedData = $request->validate([
                'status'               => 'required',
                'title'                => 'required',
                'slug'                 => 'required|unique:teams',
                'gallery_category_id'   => 'required|numeric',
                'description'          => '',
                'image'                => '',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);
            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image)->resize(500, 400);

            $validatedData['image'] = $imagename;

            try {
                $oldImage = $gallery->image;
                $gallery->update($validatedData);
                $path = public_path('storage/uploads/galleries/');

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

                return redirect()->route('gallery.edit', $gallery->id)->with('successMessage', 'Gallery successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('gallery.index')->with('errorMessage', $ex->getMessage());
            }
        }else{

            $validatedData = $request->validate([
                'status'               => 'required',
                'title'                => 'required',
                'slug'                 => 'required|unique:teams',
                'gallery_category_id'   => 'required|numeric',
                'description'          => '',
                'image'                => '',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);

            try {
                $gallery->update($validatedData);
                return redirect()->route('gallery.edit', $gallery->id)->with('successMessage', 'Gallery successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('gallery.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $oldImage = $gallery->image;

        if($gallery->delete())
        {
            $path = public_path('storage/uploads/galleries/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('gallery.index')->with('successMessage', 'Gallery successfully deleted!');
        }
    }
}
