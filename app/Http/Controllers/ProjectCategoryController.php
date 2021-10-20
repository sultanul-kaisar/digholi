<?php

namespace App\Http\Controllers;

use App\Model\ProjectCategory;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class ProjectCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|project category view'], ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|project category create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|project category edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|project category delete'], ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectCategories = ProjectCategory::all();

        return view('backend.project-categories.index', compact('projectCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProjectCategory::where('status', 'active')->get();
        return view('backend.project-categories.create', compact('categories'));
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
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:project_categories',
                'description'       => '',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => ''
            ]);

            try {
                $projectCategory = new ProjectCategory;
                $projectCategory->create($validatedData);
                return redirect()->route('project-category.index')->with('successMessage', 'Project category successfully created!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('project-category.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:project_categories',
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
                $projectCategory = new ProjectCategory;
                if($projectCategory->create($validatedData))
                {
                    $path = public_path('storage/uploads/project-categories/');

                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $image->save($path.$imagename);
                    return redirect()->route('project-category.index')->with('successMessage', 'Project category successfully created!');
                }

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('project-category.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectCategory $projectCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectCategory $projectCategory)
    {
        $categories = ProjectCategory::where('status', 'active')->get();
        return view('backend.project-categories.edit', compact('categories', 'projectCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectCategory $projectCategory)
    {
        if(!$request->has('image')){
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'unique:project_categories,slug,'.$projectCategory->id,
                'description'       => '',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => '',
                'status'            => 'required'
            ]);

            try {
                $projectCategory->update($validatedData);
                return redirect()->route('project-category.edit', $projectCategory->id)->with('successMessage', 'Project category successfully updated!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('project-category.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'unique:project_categories,slug,'.$projectCategory->id,
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

            $oldImage = $projectCategory->image;
            try {
                if($projectCategory->update($validatedData))
                {
                    $path = public_path('storage/uploads/project-categories/');

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
                    return redirect()->route('project-category.edit', $projectCategory->id)->with('successMessage', 'Project category successfully updated!');
                }

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('project-category.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        $oldImage = $projectCategory->image;

        if($projectCategory->delete())
        {
            $path = public_path('storage/uploads/project-categories/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('project-category.index')->with('successMessage', 'Project category successfully deleted!');
        }
    }
}
