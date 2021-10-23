<?php

namespace App\Http\Controllers;

use App\Model\Slider;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;
class SliderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|slider view'], ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|slider create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|slider edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|slider delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
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
                'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:3072'
            ]);
        }else{
            $validatedData = $request->validate([
                'title'        => '',
                'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:3072'
            ]);
        }
        $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

        $image = Image::make($request->image)->resize(1280, 715);

        $validatedData['image'] = $imagename;

        try {
            $slider = new Slider();
            $slider->create($validatedData);
            $path = public_path('storage/uploads/sliders/');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $image->save($path.$imagename);

            return redirect()->route('slider.index')->with('successMessage', 'Slider successfully created!');

        } catch (\Exception $ex) {
            \Artisan::call('cache:clear');
            return redirect()->route('slider.index')->with('errorMessage', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        if(!$request->has('image')){
            if(!is_null($request->url))
            {
                $validatedData = $request->validate([
                    'align'        => 'required',
                    'status'       => 'required',
                    'title'        => ''
                ]);
            }else{
                $validatedData = $request->validate([
                    'align'        => 'required',
                    'status'       => 'required',
                    'title'        => ''
                ]);
            }

            try {
                $slider->update($validatedData);
                return redirect()->route('slider.edit', $slider->id)->with('successMessage', 'Slider successfully updated!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('slider.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            if(!is_null($request->url))
            {
                $validatedData = $request->validate([
                    'align'        => 'required',
                    'status'       => 'required',
                    'title'        => '',
                    'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:3072'
                ]);
            }else{
                $validatedData = $request->validate([
                    'align'        => 'required',
                    'status'       => 'required',
                    'title'        => '',
                    'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:3072'
                ]);
            }

            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image)->resize(1280, 715);

            $validatedData['image'] = $imagename;

            try {
                $oldImage = $slider->image;
                $slider->update($validatedData);
                $path = public_path('storage/uploads/sliders/');

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

                return redirect()->route('slider.edit', $slider->id)->with('successMessage', 'Slider successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('slider.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $oldImage = $slider->image;

        if($slider->delete())
        {
            $path = public_path('storage/uploads/sliders/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('slider.index')->with('successMessage', 'Slider successfully deleted!');
        }
    }
}
