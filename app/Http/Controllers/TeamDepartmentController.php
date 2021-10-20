<?php

namespace App\Http\Controllers;

use App\Model\TeamDepartment;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class TeamDepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|team department view'], ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|team department create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|team department edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|team department delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamDepartments = TeamDepartment::all();

        return view('backend.team-departments.index', compact('teamDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.team-departments.create');
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
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:team_departments',
                'description'       => '',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => ''
            ]);

            try {
                $TeamDepartment = new TeamDepartment();
                $TeamDepartment->create($validatedData);
                return redirect()->route('team-department.index')->with('successMessage', 'Team department successfully created!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('team-department.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            $validatedData = $request->validate([
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:team_departments',
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
                $TeamDepartment = new TeamDepartment();
                if($TeamDepartment->create($validatedData))
                {
                    $path = public_path('storage/uploads/team-departments/');

                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $image->save($path.$imagename);
                    return redirect()->route('team-department.index')->with('successMessage', 'Team department successfully created!');
                }

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('team-department.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\TeamDepartment  $teamDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(TeamDepartment $teamDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\TeamDepartment  $teamDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamDepartment $teamDepartment)
    {
        return view('backend.team-departments.edit', compact('teamDepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\TeamDepartment  $teamDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamDepartment $teamDepartment)
    {
        if(!$request->has('image')){
            $validatedData = $request->validate([
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:team_departments,slug,'.$teamDepartment->id,
                'description'       => '',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => '',
                'status'            => 'required'
            ]);

            try {
                $teamDepartment->update($validatedData);
                return redirect()->route('team-department.edit', $teamDepartment->id)->with('successMessage', 'Team department successfully updated!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('team-department.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            $validatedData = $request->validate([
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:team_departments,slug,'.$teamDepartment->id,
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

            $oldImage = $teamDepartment->image;
            try {
                if($teamDepartment->update($validatedData))
                {
                    $path = public_path('storage/uploads/team-departments/');

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
                    return redirect()->route('team-department.edit', $teamDepartment->id)->with('successMessage', 'Team department successfully updated!');
                }

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('team-department.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\TeamDepartment  $teamDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamDepartment $teamDepartment)
    {
        $oldImage = $teamDepartment->image;

        if($teamDepartment->delete())
        {
            $path = public_path('storage/uploads/team-departments/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('team-department.index')->with('successMessage', 'Team department successfully deleted!');
        }
    }
}
