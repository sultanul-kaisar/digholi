<?php

namespace App\Http\Controllers;

use App\CoverPhoto\AboutPhoto;
use Illuminate\Http\Request;

class AboutPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = AboutPhoto::all();
        return view('admin.coverphotos.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coverphotos.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutPhoto  $aboutPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(AboutPhoto $aboutPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutPhoto  $aboutPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutPhoto $aboutPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutPhoto  $aboutPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutPhoto $aboutPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutPhoto  $aboutPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutPhoto $aboutPhoto)
    {
        //
    }
}
