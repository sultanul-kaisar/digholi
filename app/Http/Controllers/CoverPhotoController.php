<?php

namespace App\Http\Controllers;

use App\Model\CoverPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use File;

class CoverPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coverphotos = CoverPhoto::all();
        // dd($coverphotos);
        return view('admin.settings.coverphoto',compact('coverphotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validateData = $request->validate([
            'index_photo'       => 'mimes:jpeg,jpg,png,gif,mp4|image|required|file|max:10240',
            'about_photo'       => 'required|file|image|max:5120',
            'team_photo'        => 'required|file|image|max:5120',
            'service_photo'     => 'required|file|image|max:5120',
            'portfolio_photo'   => 'required|file|image|max:5120',
            'gallery_photo'     => 'required|file|image|max:5120',
            'blog_photo'        => 'required|file|image|max:5120',
            'contact_photo'     => 'required|file|image|max:5120'
        ]);
        if($request->has('index_photo')){
            $validatedData['index_photo'] =  'index_photo_'.str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('index_photo')->extension();

            // create an index_photo manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $index_photo = $manager->make($request->index_photo)->resize();
        }

        if($request->has('about_photo')){
            $validatedData['about_photo'] =  'about_photo_'.str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('about_photo')->extension();

            // create an about_photo manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $about_photo = $manager->make($request->about_photo)->resize();
        }

        if($request->has('team_photo')){
            $validatedData['team_photo'] =  'team_photo_'.str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('team_photo')->extension();

            // create an team_photo manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $team_photo = $manager->make($request->team_photo)->resize();
        }

        if($request->has('service_photo')){
            $validatedData['service_photo'] =  'service_photo_'.str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('service_photo')->extension();

            // create an service_photo manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $service_photo = $manager->make($request->service_photo)->resize();
        }

        if($request->has('portfolio_photo')){
            $validatedData['portfolio_photo'] =  'portfolio_photo_'.str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('portfolio_photo')->extension();

            // create an portfolio_photo manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $portfolio_photo = $manager->make($request->portfolio_photo)->resize();
        }

        if($request->has('gallery_photo')){
            $validatedData['gallery_photo'] =  'gallery_photo_'.str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('gallery_photo')->extension();

            // create an gallery_photo manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $gallery_photo = $manager->make($request->gallery_photo)->resize();
        }

        if($request->has('blog_photo')){
            $validatedData['blog_photo'] =  'blog_photo_'.str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('blog_photo')->extension();

            // create an blog_photo manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $blog_photo = $manager->make($request->blog_photo)->resize();
        }

        if($request->has('contact_photo')){
            $validatedData['contact_photo'] =  'contact_photo_'.str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('contact_photo')->extension();

            // create an contact_photo manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $contact_photo = $manager->make($request->contact_photo)->resize();
        }

        //Cleaning data here

        if(CoverPhoto::create($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $index_photo->save(public_path('storage/uploads/coverphotos/'.$validatedData['index_photo']));
            return redirect()->route('index-photo')->with('successMessage', 'Index photo successfully updated!');
        }
        return redirect()->route('index-photo')->with('errorMessage', 'An error has occurred please try again later!');

        if(CoverPhoto::create($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $about_photo->save(public_path('storage/uploads/coverphotos/'.$validatedData['about_photo']));
            return redirect()->route('about-photo')->with('successMessage', 'About Photo successfully updated!');
        }
        return redirect()->route('about-photo')->with('errorMessage', 'An error has occurred please try again later!');

        if(CoverPhoto::create($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $team_photo->save(public_path('storage/uploads/coverphotos/'.$validatedData['team_photo']));
            return redirect()->route('team-photo')->with('successMessage', 'Team Photo successfully updated!');
        }
        return redirect()->route('team-photo')->with('errorMessage', 'An error has occurred please try again later!');

        if(CoverPhoto::create($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $service_photo->save(public_path('storage/uploads/coverphotos/'.$validatedData['service_photo']));
            return redirect()->route('service-photo')->with('successMessage', 'Service Photo successfully updated!');
        }
        return redirect()->route('service-photo')->with('errorMessage', 'An error has occurred please try again later!');

        if(CoverPhoto::create($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $portfolio_photo->save(public_path('storage/uploads/coverphotos/'.$validatedData['portfolio_photo']));
            return redirect()->route('portfolio-photo')->with('successMessage', 'Portfolio Photo successfully updated!');
        }
        return redirect()->route('portfolio-photo')->with('errorMessage', 'An error has occurred please try again later!');

        if(CoverPhoto::create($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $gallery_photo->save(public_path('storage/uploads/coverphotos/'.$validatedData['gallery_photo']));
            return redirect()->route('gallery-photo')->with('successMessage', 'Gallery Photo successfully updated!');
        }
        return redirect()->route('gallery-photo')->with('errorMessage', 'An error has occurred please try again later!');

        if(CoverPhoto::create($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $blog_photo->save(public_path('storage/upload/coverphotos/'.$validatedData['blog_photo']));
            return redirect()->route('blog-photo')->with('successMessage', 'Blog Photo successfully updated!');
        }
        return redirect()->route('blog-photo')->with('errorMessage', 'An error has occurred please try again later!');

        if(CoverPhoto::create($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $contact_photo->save(public_path('storage/uploads/coverphotos/'.$validatedData['contact_photo']));
            return redirect()->route('contact-photo')->with('successMessage', 'Contact Photo successfully updated!');
        }
        return redirect()->route('contact-photo')->with('errorMessage', 'An error has occurred please try again later!');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'index_photo'       => 'mimes:jpeg,jpg,png,gif,mp4|image|required|file|max:10240',
            'about_photo'       => 'required|file|image|max:5120',
            'team_photo'        => 'required|file|image|max:5120',
            'service_photo'     => 'required|file|image|max:5120',
            'portfolio_photo'   => 'required|file|image|max:5120',
            'gallery_photo'     => 'required|file|image|max:5120',
            'blog_photo'        => 'required|file|image|max:5120',
            'contact_photo'     => 'required|file|image|max:5120'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CoverPhoto  $coverPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(CoverPhoto $coverPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CoverPhoto  $coverPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(CoverPhoto $coverPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CoverPhoto  $coverPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoverPhoto $coverPhoto)
    {
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CoverPhoto  $coverPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoverPhoto $coverPhoto)
    {
        //
    }
    public function indexPhotoUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image'     => 'required|file|mimes:jpeg,jpg,png,gif|image|max:10240'
        ]);

        $oldImage = Auth::user()->coverPhoto->index_photo;

        if($request->has('index_photo')){
            $validatedData['index_photo'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('index_photo')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->index_photo)->resize();
        }

        if(CoverPhoto::where('user_id', Auth::user()->id)->update($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($image->save(public_path('storage/uploads/coverphotos/'.$validatedData['index_photo']))){
                if (is_file(public_path('storage/uploads/coverphotos/'.$oldImage))) {
                    unlink(public_path('storage/uploads/coverphotos/'.$oldImage));
                }
            }

            return redirect()->route('coverphoto')->with('successMessage', 'Index photo successfully updated!');
        }
        return redirect()->route('coverphoto')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function aboutPhotoUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image'     => 'required|file|image|max:6240'
        ]);

        $oldImage = Auth::user()->coverPhoto->about_photo;

        if($request->has('about_photo')){
            $validatedData['about_photo'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('about_photo')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->about_photo)->resize();
        }

        if(CoverPhoto::where('user_id', Auth::user()->id)->update($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($image->save(public_path('storage/uploads/coverphotos/'.$validatedData['about_photo']))){
                if (is_file(public_path('storage/uploads/coverphotos/'.$oldImage))) {
                    unlink(public_path('storage/uploads/coverphotos/'.$oldImage));
                }
            }

            return redirect()->route('coverphoto')->with('successMessage', 'About photo successfully updated!');
        }
        return redirect()->route('coverphoto')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function teamPhotoUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image'     => 'required|file|image|max:6240'
        ]);

        $oldImage = Auth::user()->coverPhoto->team_photo;

        if($request->has('team_photo')){
            $validatedData['team_photo'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('team_photo')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->team_photo)->resize();
        }

        if(CoverPhoto::where('user_id', Auth::user()->id)->update($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($image->save(public_path('storage/uploads/coverphotos/'.$validatedData['team_photo']))){
                if (is_file(public_path('storage/uploads/coverphotos/'.$oldImage))) {
                    unlink(public_path('storage/uploads/coverphotos/'.$oldImage));
                }
            }

            return redirect()->route('coverphoto')->with('successMessage', 'Team photo successfully updated!');
        }
        return redirect()->route('coverphoto')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function servicePhotoUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image'     => 'required|file|image|max: 6240'
        ]);

        $oldImage = Auth::user()->coverPhoto->service_photo;

        if($request->has('service_photo')){
            $validatedData['service_photo'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('service_photo')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->service_photo)->resize();
        }

        if(CoverPhoto::where('user_id', Auth::user()->id)->update($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($image->save(public_path('storage/uploads/coverphotos/'.$validatedData['service_photo']))){
                if (is_file(public_path('storage/uploads/coverphotos/'.$oldImage))) {
                    unlink(public_path('storage/uploads/coverphotos/'.$oldImage));
                }
            }

            return redirect()->route('coverphoto')->with('successMessage', 'Service photo successfully updated!');
        }
        return redirect()->route('coverphoto')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function portfolioPhotoUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image'     => 'required|file|image|max:6240'
        ]);

        $oldImage = Auth::user()->coverPhoto->portfolio_photo;

        if($request->has('portfolio_photo')){
            $validatedData['portfolio_photo'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('portfolio_photo')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->portfolio_photo)->resize();
        }

        if(CoverPhoto::where('user_id', Auth::user()->id)->update($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($image->save(public_path('storage/uploads/coverphotos/'.$validatedData['portfolio_photo']))){
                if (is_file(public_path('storage/uploads/coverphotos/'.$oldImage))) {
                    unlink(public_path('storage/uploads/coverphotos/'.$oldImage));
                }
            }

            return redirect()->route('coverphoto')->with('successMessage', 'Portfolio photo successfully updated!');
        }
        return redirect()->route('coverphoto')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function galleryPhotoUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image'     => 'required|file|image|max:6240'
        ]);

        $oldImage = Auth::user()->coverPhoto->gallery_photo;

        if($request->has('gallery_photo')){
            $validatedData['gallery_photo'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('gallery_photo')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->gallery_photo)->resize();
        }

        if(CoverPhoto::where('user_id', Auth::user()->id)->update($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($image->save(public_path('storage/uploads/coverphotos/'.$validatedData['gallery_photo']))){
                if (is_file(public_path('storage/uploads/coverphotos/'.$oldImage))) {
                    unlink(public_path('storage/uploads/coverphotos/'.$oldImage));
                }
            }

            return redirect()->route('coverphoto')->with('successMessage', 'Gallery photo successfully updated!');
        }
        return redirect()->route('coverphoto')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function blogPhotoUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image'     => 'required|file|image|max:6240'
        ]);

        $oldImage = Auth::user()->coverPhoto->blog_photo;

        if($request->has('blog_photo')){
            $validatedData['blog_photo'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('blog_photo')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->blog_photo)->resize();
        }

        if(CoverPhoto::where('user_id', Auth::user()->id)->update($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($image->save(public_path('storage/uploads/coverphotos/'.$validatedData['blog_photo']))){
                if (is_file(public_path('storage/uploads/coverphotos/'.$oldImage))) {
                    unlink(public_path('storage/uploads/coverphotos/'.$oldImage));
                }
            }

            return redirect()->route('coverphoto')->with('successMessage', 'Blog photo successfully updated!');
        }
        return redirect()->route('coverphoto')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function contactPhotoUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image'     => 'required|file|image|max:6240'
        ]);

        $oldImage = Auth::user()->coverPhoto->contact_photo;

        if($request->has('contact_photo')){
            $validatedData['contact_photo'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('contact_photo')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->contact_photo)->resize();
        }

        if(CoverPhoto::where('user_id', Auth::user()->id)->update($validatedData)){
            $path = public_path('storage/uploads/coverphotos/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($image->save(public_path('storage/uploads/coverphotos/'.$validatedData['contact_photo']))){
                if (is_file(public_path('storage/uploads/coverphotos/'.$oldImage))) {
                    unlink(public_path('storage/uploads/coverphotos/'.$oldImage));
                }
            }

            return redirect()->route('coverphoto')->with('successMessage', 'Contact photo successfully updated!');
        }
        return redirect()->route('coverphoto')->with('errorMessage', 'An error has occurred please try again later!');
    }

}
