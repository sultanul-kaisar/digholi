<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|client view'], ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|client create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|client edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|client delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('backend.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.clients.create');
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
                'title'        => 'required',
                'slug'         => 'required|unique:clients',
                'url'          => 'url',
                'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'description'  => ''
            ]);
        }else{
            $validatedData = $request->validate([
                'title'        => 'required',
                'slug'         => 'required|unique:clients',
                'url'          => '',
                'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'description'  => ''
            ]);
        }
        $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

        $image = Image::make($request->image)->resize(300, 150);

        $validatedData['image'] = $imagename;

        try {
            $client = new Client();
            $client->create($validatedData);
            $path = public_path('storage/uploads/clients/');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $image->save($path.$imagename);

            return redirect()->route('client.index')->with('successMessage', 'Client successfully created!');

        } catch (\Exception $ex) {
            \Artisan::call('cache:clear');
            return redirect()->route('client.index')->with('errorMessage', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('backend.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        if(!$request->has('image')){
            if(!is_null($request->url))
            {
                $validatedData = $request->validate([
                    'status'       => 'required',
                    'title'        => 'required',
                    'slug'         => 'required|unique:clients,slug,'.$client->id,
                    'url'          => 'url',
                    'description'  => ''
                ]);
            }else{
                $validatedData = $request->validate([
                    'status'       => 'required',
                    'title'        => 'required',
                    'slug'         => 'required|unique:clients,slug,'.$client->id,
                    'url'          => '',
                    'description'  => ''
                ]);
            }

            try {
                $client->update($validatedData);
                return redirect()->route('client.edit', $client->id)->with('successMessage', 'Client successfully updated!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('client.index')->with('errorMessage', $ex->getMessage());
            }
        }else{
            if(!is_null($request->url))
            {
                $validatedData = $request->validate([
                    'status'       => 'required',
                    'title'        => 'required',
                    'slug'         => 'required|unique:clients,slug,'.$client->id,
                    'url'          => 'url',
                    'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                    'description'  => ''
                ]);
            }else{
                $validatedData = $request->validate([
                    'status'       => 'required',
                    'title'        => 'required',
                    'slug'         => 'required|unique:clients,slug,'.$client->id,
                    'url'          => '',
                    'image'        => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                    'description'  => ''
                ]);
            }

            $imagename =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            $image = Image::make($request->image)->resize(300, 150);

            $validatedData['image'] = $imagename;

            try {
                $oldImage = $client->image;
                $client->update($validatedData);
                $path = public_path('storage/uploads/clients/');

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

                return redirect()->route('client.edit', $client->id)->with('successMessage', 'Client successfully updated!');

            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('client.index')->with('errorMessage', $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $oldImage = $client->image;

        if($client->delete())
        {
            $path = public_path('storage/uploads/clients/');
            if($oldImage != 'default.jpg')
            {
                if (is_file($path.$oldImage)) {
                    unlink($path.$oldImage);
                }
            }

            return redirect()->route('client.index')->with('successMessage', 'Client successfully deleted!');
        }
    }
}
