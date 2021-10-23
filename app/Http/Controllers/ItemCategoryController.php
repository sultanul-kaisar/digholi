<?php

namespace App\Http\Controllers;

use App\Model\ItemCategory;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class ItemCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|item category view'], ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|item category create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|item category edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|item category delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemCategories = ItemCategory::all();

        return view('admin.item-categories.index', compact('itemCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ItemCategory::where('status', 'active')->get();
        return view('admin.item-categories.create', compact('categories'));
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
                'slug'              => 'required|unique:item_categories',
                'description'       => '',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => ''
            ]);

            try {
                $itemCategory = new ItemCategory;
                $itemCategory->create($validatedData);
                return redirect()->route('item-category.index')->with('successMessage', 'Item category successfully created!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('item-category.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:item_categories',
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
                $itemCategory = new ItemCategory;
                if($itemCategory->create($validatedData))
                {
                    $path = public_path('storage/uploads/item-categories/');

                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $image->save($path.$imagename);
                    return redirect()->route('item-category.index')->with('successMessage', 'Item category successfully created!');
                }

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('item-category.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemCategory $itemCategory)
    {
        $categories = ItemCategory::where('status', 'active')->get();
        return view('admin.item-categories.edit', compact('categories', 'itemCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemCategory $itemCategory)
    {
        if(!$request->has('image')){
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:item_categories,slug,'.$itemCategory->id,
                'description'       => '',
                'meta_title'        => '',
                'meta_keyword'      => '',
                'meta_description'  => '',
                'status'            => 'required'
            ]);

            try {
                $itemCategory->update($validatedData);
                return redirect()->route('item-category.edit', $itemCategory->id)->with('successMessage', 'Item category successfully updated!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('item-category.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            $validatedData = $request->validate([
                'parent_id'         => '',
                'title'             => 'required|min:3|max:100',
                'slug'              => 'required|unique:item_categories,slug,'.$itemCategory->id,
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

            $oldImage = $itemCategory->image;
            try {
                if($itemCategory->update($validatedData))
                {
                    $path = public_path('storage/uploads/item-categories/');

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
                    return redirect()->route('item-category.edit', $itemCategory->id)->with('successMessage', 'Item category successfully updated!');
                }

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('item-category.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemCategory $itemCategory)
    {
        $oldImage = $itemCategory->image;

        if($itemCategory->delete())
        {
            $path = public_path('storage/uploads/item-categories/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('item-category.index')->with('successMessage', 'Item category successfully deleted!');
        }
    }
}
