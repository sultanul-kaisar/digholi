<?php

namespace App\Http\Controllers;

use App\Model\Team;
use App\Model\TeamDepartment;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class TeamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|team view'], ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|team create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|team edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|team delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();

        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = TeamDepartment::where('status', 'active')->get();
        return view('admin.teams.create', compact('departments'));
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
                'title'                => 'required',
                'slug'                 => 'required|unique:teams',
                'team_department_id'   => 'required|numeric',
                'description'          => 'required|max:100',
                'address'              => '',
                'phone'                => '',
                'email'                => '',
                'url'                  => 'url',
                'image'                => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'facebook'             => '',
                'instagram'            => '',
                'twitter'              => ''
            ]);
        }else{
            $validatedData = $request->validate([
                'title'                => 'required',
                'slug'                 => 'required|unique:teams',
                'team_department_id'   => 'required|numeric',
                'description'          => 'required|max:100',
                'address'              => '',
                'phone'                => '',
                'email'                => '',
                'url'                  => '',
                'image'                => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'facebook'             => '',
                'instagram'            => '',
                'twitter'              => ''
            ]);
        }
        $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

        $image = Image::make($request->image)->resize(200, 200);

        $validatedData['image'] = $imagename;

        try {
            $team = new Team();
            $team->create($validatedData);
            $path = public_path('storage/uploads/teams/');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $image->save($path.$imagename);

            return redirect()->route('team.index')->with('successMessage', 'Team successfully created!');

        } catch (\Exception $ex) {
            \Artisan::call('cache:clear');
            return redirect()->route('team.index')->with('errorMessage', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $departments = TeamDepartment::where('status', 'active')->get();
        return view('admin.teams.edit', compact('departments', 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        if($request->has('image'))
        {
            if(!is_null($request->url))
            {
                $validatedData = $request->validate([
                    'status'               => 'required',
                    'title'                => 'required',
                    'slug'                 => 'required|unique:teams,slug,'.$team->id,
                    'team_department_id'   => 'required|numeric',
                    'description'          => 'required|max:100',
                    'address'              => '',
                    'phone'                => '',
                    'email'                => '',
                    'url'                  => 'url',
                    'image'                => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                    'facebook'             => '',
                    'instagram'            => '',
                    'twitter'              => ''
                ]);
            }else{
                $validatedData = $request->validate([
                    'status'               => 'required',
                    'title'                => 'required',
                    'slug'                 => 'required|unique:teams,slug,'.$team->id,
                    'team_department_id'   => 'required|numeric',
                    'description'          => 'required|max:100',
                    'address'              => '',
                    'phone'                => '',
                    'email'                => '',
                    'url'                  => '',
                    'image'                => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                    'facebook'             => '',
                    'instagram'            => '',
                    'twitter'              => ''
                ]);
            }
            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image)->resize(200, 200);

            $validatedData['image'] = $imagename;

            try {
                $oldImage = $team->image;
                $team->update($validatedData);
                $path = public_path('storage/uploads/teams/');

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

                return redirect()->route('team.edit', $team->id)->with('successMessage', 'Team successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('team.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            if(!is_null($request->url))
            {
                $validatedData = $request->validate([
                    'status'               => 'required',
                    'title'                => 'required',
                    'slug'                 => 'required|unique:teams,slug,'.$team->id,
                    'team_department_id'   => 'required|numeric',
                    'description'          => 'required|max:100',
                    'address'              => '',
                    'phone'                => '',
                    'email'                => '',
                    'url'                  => 'url',
                    'facebook'             => '',
                    'instagram'            => '',
                    'twitter'              => ''
                ]);
            }else{
                $validatedData = $request->validate([
                    'status'               => 'required',
                    'title'                => 'required',
                    'slug'                 => 'required|unique:teams,slug,'.$team->id,
                    'team_department_id'   => 'required|numeric',
                    'description'          => 'required|max:100',
                    'address'              => '',
                    'phone'                => '',
                    'email'                => '',
                    'url'                  => '',
                    'facebook'             => '',
                    'instagram'            => '',
                    'twitter'              => ''
                ]);
            }

            try {
                $team->update($validatedData);
                return redirect()->route('team.edit', $team->id)->with('successMessage', 'Team successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('team.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $oldImage = $team->image;

        if($team->delete())
        {
            $path = public_path('storage/uploads/teams/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('team.index')->with('successMessage', 'Team successfully deleted!');
        }
    }
}
