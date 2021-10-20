<?php

namespace App\Http\Controllers;

use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Str;
use File;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|setting view'],   ['only' => ['index', 'seo']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|setting edit'], ['only' => ['general', 'local', 'logo', 'adminLogo', 'seoStore', 'ogImage']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.settings.setting');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function general(Request $request)
    {

        $validateData = $request->validate([
            'site_title'       => 'required',
            'site_tagline'     => '',
            'site_url'         => '',
            'site_description' => ''
        ]);

        DB::beginTransaction();
        try{
            foreach($validateData as $key=>$value)
            {
                $getData = Setting::where('key', $key)->first();
                $updatedData['value'] = $value;
                $getData->update($updatedData);
            }
            DB::commit();
            return redirect()->route('admin.system.settings')->with('successMessage', 'General settings successfully updated!');
        }catch(\Exception $ex){
            DB::rollback();
            \Artisan::call('cache:clear');
            return redirect()->route('admin.system.settings')->with('errorMessage', $ex->getMessage());
        }
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function local(Request $request)
    {
        $validateData = $request->validate([
            'site_time_zone'       => 'required',
            'site_date_format'     => ''
        ]);

        DB::beginTransaction();
        try{
            foreach($validateData as $key=>$value)
            {
                $getData = Setting::where('key', $key)->first();
                $updatedData['value'] = $value;
                $getData->update($updatedData);
            }
            DB::commit();
            return redirect()->route('admin.system.settings')->with('successMessage', 'Local settings successfully updated!');
        }catch(\Exception $ex){
            DB::rollback();
            \Artisan::call('cache:clear');
            return redirect()->route('admin.system.settings')->with('errorMessage', $ex->getMessage());
        }
    }


    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logo(Request $request)
    {
        $validateData = $request->validate([
            'site_logo'        => 'required|file|mimes:jpeg,jpg,png,gif|max:2048',
            'site_logo_width'  => 'required|numeric',
            'site_logo_height' => 'required|numeric'
        ]);

        $requestedData['site_logo'] = $request->site_logo;

        DB::beginTransaction();
        try{
            foreach($requestedData as $key=>$value)
            {
                $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('site_logo')->extension();
                $image = Image::make($request->site_logo)->resize($validateData['site_logo_width'], $validateData['site_logo_height']);

                $getData = Setting::where('key', $key)->first();
                $oldImage = $getData->value;
                $updatedData['value'] = $imagename;
                $getData->update($updatedData);

                $path = public_path('storage/uploads/settings/frontend/');

                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }

                if($oldImage != 'default.png')
                {
                    if (is_file($path.$oldImage)) {
                        unlink($path.$oldImage);
                    }
                }

                $image->save($path.$imagename);
            }

            DB::commit();
            return redirect()->route('admin.system.settings')->with('successMessage', 'Site logo successfully updated!');
        }catch(\Exception $ex){
            DB::rollback();
            \Artisan::call('cache:clear');
            return redirect()->route('admin.system.settings')->with('errorMessage', $ex->getMessage());
        }
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminLogo(Request $request)
    {
        $validateData = $request->validate([
            'site_admin_logo'  => 'required|file|mimes:jpeg,jpg,png,gif|max:2048',
            'site_logo_width'  => 'required|numeric',
            'site_logo_height' => 'required|numeric'
        ]);

        $requestedData['site_admin_logo'] = $request->site_admin_logo;

        DB::beginTransaction();
        try{
            foreach($requestedData as $key=>$value)
            {
                $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('site_admin_logo')->extension();
                $image = Image::make($request->site_admin_logo)->resize($validateData['site_logo_width'], $validateData['site_logo_height']);

                $getData = Setting::where('key', $key)->first();
                $oldImage = $getData->value;
                $updatedData['value'] = $imagename;
                $getData->update($updatedData);

                $path = public_path('storage/uploads/settings/backend/');

                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }

                if($oldImage != 'default.png')
                {
                    if (is_file($path.$oldImage)) {
                        unlink($path.$oldImage);
                    }
                }

                $image->save($path.$imagename);
            }

            DB::commit();
            return redirect()->route('admin.system.settings')->with('successMessage', 'Admin logo successfully updated!');
        }catch(\Exception $ex){
            DB::rollback();
            \Artisan::call('cache:clear');
            return redirect()->route('admin.system.settings')->with('errorMessage', $ex->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seo()
    {
        return view('backend.settings.seo');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function seoStore(Request $request)
    {

        $validateData = $request->validate([
            'site_meta_title'       => '',
            'site_meta_author'      => '',
            'site_meta_url'         => '',
            'site_meta_type'        => '',
            'site_meta_robot'       => '',
            'site_twitter_author'   => '',
            'site_twitter_card'     => '',
            'site_meta_keyword'     => '',
            'site_meta_description' => ''
        ]);

        DB::beginTransaction();
        try{
            foreach($validateData as $key=>$value)
            {
                $getData = Setting::where('key', $key)->first();
                $updatedData['value'] = $value;
                $getData->update($updatedData);
            }
            DB::commit();
            return redirect()->route('admin.system.seo')->with('successMessage', 'Seo settings successfully updated!');
        }catch(\Exception $ex){
            DB::rollback();
            \Artisan::call('cache:clear');
            return redirect()->route('admin.system.seo')->with('errorMessage', $ex->getMessage());
        }
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ogImage(Request $request)
    {
        $validateData = $request->validate([
            'site_meta_image'  => 'required|file|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $requestedData['site_meta_image'] = $request->site_meta_image;

        DB::beginTransaction();
        try{
            foreach($requestedData as $key=>$value)
            {
                $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('site_meta_image')->extension();
                $image = Image::make($request->site_meta_image)->resize(1200, 630);

                $getData = Setting::where('key', $key)->first();
                $oldImage = $getData->value;
                $updatedData['value'] = $imagename;
                $getData->update($updatedData);

                $path = public_path('storage/uploads/settings/backend/');

                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }

                if($oldImage != 'default.png')
                {
                    if (is_file($path.$oldImage)) {
                        unlink($path.$oldImage);
                    }
                }

                $image->save($path.$imagename);
            }

            DB::commit();
            return redirect()->route('admin.system.seo')->with('successMessage', 'Facebook OG:IMAGE successfully updated!');
        }catch(\Exception $ex){
            DB::rollback();
            \Artisan::call('cache:clear');
            return redirect()->route('admin.system.seo')->with('errorMessage', $ex->getMessage());
        }
    }
}
