<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Blog;
use App\Model\Project;
use App\Model\Gallery;
use App\Model\Client;


class BackendController extends Controller
{
    public function login()
    {
        if(auth()->check())
        {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('admin/login');
    }

    public function dashboard(){
        $projects   = Project::all();
        $blogs      = Blog::all();
        $galleries  = Gallery::all();
        $clients    = Client::all();
        return view('admin.dashboard', compact('projects', 'blogs', 'galleries', 'clients'));
    }

}

