<?php

namespace App\Http\Controllers;

use App\Model\Testimonial;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class TestimonialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|testimonial view'], ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|testimonial create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|testimonial edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|testimonial delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('backend.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'        => 'required',
            'designation'  => 'required',
            'company'      => '',
            'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'description'  => 'min:50|max:400'
        ]);

        $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

        $image = Image::make($request->image)->resize(200, 200);

        $validatedData['image'] = $imagename;

        try {
            $testimonial = new Testimonial();
            $testimonial->create($validatedData);
            $path = public_path('storage/uploads/testimonials/');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $image->save($path.$imagename);

            return redirect()->route('testimonial.index')->with('successMessage', 'Testimonial successfully created!');

        } catch (\Exception $ex) {
            \Artisan::call('cache:clear');
            return redirect()->route('testimonial.index')->with('errorMessage', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        if(!$request->has('image')){
            $validatedData = $request->validate([
                'status'       => 'required',
                'title'        => 'required',
                'designation'  => 'required',
                'company'      => '',
                'description'  => 'min:50|max:400'
            ]);

            try {
                $testimonial->update($validatedData);
                return redirect()->route('testimonial.edit', $testimonial->id)->with('successMessage', 'Testimonial successfully updated!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('testimonial.index')->with('errorMessage', $ex->getMessage());
            }
        }else{

            $validatedData = $request->validate([
                'status'       => 'required',
                'title'        => 'required',
                'designation'  => 'required',
                'company'      => '',
                'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'description'  => 'min:50|max:400'
            ]);

            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image)->resize(200, 200);

            $validatedData['image'] = $imagename;

            try {
                $oldImage = $testimonial->image;
                $testimonial->update($validatedData);
                $path = public_path('storage/uploads/testimonials/');

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

                return redirect()->route('testimonial.edit', $testimonial->id)->with('successMessage', 'Testimonial successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('testimonial.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $oldImage = $testimonial->image;

        if($testimonial->delete())
        {
            $path = public_path('storage/uploads/testimonials/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('testimonial.index')->with('successMessage', 'Testimonial successfully deleted!');
        }
    }
}
