<?php

namespace App\Http\Controllers;

use App\Model\Project;
use App\Model\ProjectCategory;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|project view'],   ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|project create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|project edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|project delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProjectCategory::where('status', 'active')->get();
        return view('admin.projects.create', compact('categories'));
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
                'slug'                 => 'required|unique:projects',
                'project_category_id'   => 'required|numeric',
                'description'          => '',
                'image'                => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'url'                  => 'url',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);
            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image)->resize(500, 400);

            $validatedData['image'] = $imagename;

            try {
                $project = new Project();
                $project->create($validatedData);
                $path = public_path('storage/uploads/projects/');

                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }

                $image->save($path.$imagename);

                return redirect()->route('project.index')->with('successMessage', 'Project successfully created!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('project.index')->with('errorMessage', $ex->getMessage());
            }
        }else{

            $validatedData = $request->validate([
                'title'                => 'required',
                'slug'                 => 'required|unique:projects',
                'project_category_id'   => 'required|numeric',
                'description'          => '',
                'image'                => '',
                'url'                  => 'url',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);

            try {
                $project = new Project();
                $project->create($validatedData);
                return redirect()->route('project.index')->with('successMessage', 'Project successfully created!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('project.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = ProjectCategory::where('status', 'active')->get();
        return view('admin.projects.edit', compact('categories', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if($request->has('image'))
        {
            $validatedData = $request->validate([
                'status'               => 'required',
                'title'                => 'required',
                'slug'                 => 'required',
                'project_category_id'   => 'required|numeric',
                'description'          => '',
                'image'                => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'url'                  => 'url',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);
            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image)->resize(500, 400);

            $validatedData['image'] = $imagename;

            try {
                $oldImage = $project->image;
                $project->update($validatedData);
                $path = public_path('storage/uploads/projects/');

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

                return redirect()->route('project.edit', $project->id)->with('successMessage', 'Project successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('project.index')->with('errorMessage', $ex->getMessage());
            }
        }else{

            $validatedData = $request->validate([
                'status'               => 'required',
                'title'                => 'required',
                'slug'                 => 'required',
                'project_category_id'   => 'required|numeric',
                'description'          => '',
                'image'                => '',
                'url'                  => 'url',
                'meta_title'           => '',
                'meta_description'     => '',
                'meta_keyword'         => ''
            ]);

            try {
                $project->update($validatedData);
                return redirect()->route('project.edit', $project->id)->with('successMessage', 'Project successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('project.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $oldImage = $project->image;

        if($project->delete())
        {
            $path = public_path('storage/uploads/projects/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('project.index')->with('successMessage', 'Project successfully deleted!');
        }
    }
}
