<?php

namespace App\Http\Controllers;

use App\CoverPhoto\IndexPhoto;
use App\IndexPhoto as AppIndexPhoto;
use Image;
use Illuminate\Http\Request;
use Str;
use File;

class IndexPhotoController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|index view'], ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|index create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|index edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|index delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexes = IndexPhoto::all();

        return view('admin.coverphotos.indexes.index', compact('indexes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coverphotos.indexes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!is_null($request->url))
        {
            $validatedData = $request->validate([
                'title'        => '',
                'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:12072'
            ]);
        }else{
            $validatedData = $request->validate([
                'title'        => '',
                'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:12072'
            ]);
        }
        $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

        $image = Image::make($request->image)->resize(1280, 715);

        $validatedData['image'] = $imagename;

        try {
            $index = new IndexPhoto();
            $index->create($validatedData);
            $path = public_path('storage/uploads/coverphotos/indexes/');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $image->save($path.$imagename);

            return redirect()->route('index.index')->with('successMessage', 'Index Photo successfully created!');

        } catch (\Exception $ex) {
            \Artisan::call('cache:clear');
            return redirect()->route('index.index')->with('errorMessage', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IndexPhoto  $indexPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(IndexPhoto $indexPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IndexPhoto  $indexPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(IndexPhoto $indexPhoto)
    {
        return view('admin.coverphotos.indexes.edit', compact('index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IndexPhoto  $indexPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndexPhoto $indexPhoto)
    {
        if(!$request->has('image')){
            if(!is_null($request->url))
            {
                $validatedData = $request->validate([
                    'status'       => 'required',
                    'title'        => ''
                ]);
            }else{
                $validatedData = $request->validate([
                    'status'       => 'required',
                    'title'        => ''
                ]);
            }

            try {
                $index->update($validatedData);
                return redirect()->route('index.edit', $index->id)->with('successMessage', 'Index Photo successfully updated!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('index.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            if(!is_null($request->url))
            {
                $validatedData = $request->validate([
                    'status'       => 'required',
                    'title'        => '',
                    'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:12072'
                ]);
            }else{
                $validatedData = $request->validate([
                    'status'       => 'required',
                    'title'        => '',
                    'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:12072'
                ]);
            }

            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image)->resize(1280, 715);

            $validatedData['image'] = $imagename;

            try {
                $oldImage = $index->image;
                $index->update($validatedData);
                $path = public_path('storage/uploads/coverphotos/indexes/');

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

                return redirect()->route('index.edit', $index->id)->with('successMessage', 'Index Photo successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('index.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IndexPhoto  $indexPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndexPhoto $indexPhoto)
    {
        $oldImage = $index->image;

        if($index->delete())
        {
            $path = public_path('storage/uploads/coverphotos/indexes/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('index.index')->with('successMessage', 'Index Photo successfully deleted!');
        }
    }
}
