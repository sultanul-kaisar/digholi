<?php

namespace App\Http\Controllers;

use App\Model\Blog;
use App\Model\Comment;
use App\Model\BlogCategory;
use App\Model\Client;
use App\Model\Contact;
use App\Model\Project;
use App\Model\ProjectCategory;
use App\Model\Gallery;
use App\Model\GalleryCategory;
use App\Model\Slider;
use App\Model\Team;
use App\Model\TeamDepartment;
use App\Model\Testimonial;
use App\User;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function home()
    {
        $sliders = Slider::where('status', 'active')->orderBy('id', 'asc')->get();

        $galleries = Gallery::where('status', 'active')
                        ->orderBy('id', 'desc')->take(1)->get();
        $projects = Project::where('status', 'active')
            ->orderBy('id', 'desc')->take(1)->get();
        return view('frontend.home', compact('sliders', 'galleries', 'projects'));
    }

    public function about()
    {
        $testimonials  = Testimonial::where('status', 'active')->orderBY('id', 'asc')->get();
        $clients  = Client::where('status', 'active')->orderBY('id', 'asc')->get();
        return view('frontend.about', compact('testimonials', 'clients'));
    }
    public function team()
    {
        $teams = Team::where('status', 'active')->orderBy('id', 'asc')->get();
        $team_departments = TeamDepartment::where('status', 'active')->orderBy('id', 'asc')->get();
        return view('frontend.team', compact('teams','team_departments'));
    }
    public function service()
    {
        return view('frontend.service');
    }
    public function portfolio()
    {
        $projects = Project::where('status', 'active')->orderBy('id', 'asc')->get();
        $project_categories = ProjectCategory::where('status', 'active')->orderBy('id', 'asc')->get();
        return view('frontend.portfolio', compact('projects', 'project_categories'));
    }

    public function portfolio_view($slug)
    {

        $project = Project::with('project_category')
            ->where('slug', $slug)
            ->firstOrFail();
        return view('frontend.portfolio_view', compact('project'));
    }
    public function gallery()
    {
        $galleries = Gallery::where('status', 'active')->orderBy('id', 'asc')->get();
        $gallery_categories = GalleryCategory::where('status', 'active')->orderBy('id', 'asc')->get();
        return view('frontend.gallery', compact('galleries', 'gallery_categories'));
    }
    public function gallery_view($slug)
    {

        $gallery = Gallery::with('gallery_category')
                            ->where('slug', $slug)
                            ->firstOrFail();
        return view('frontend.gallery_view', compact('gallery'));
    }

    public function blog()
    {
        $blogs = Blog::with(['blog_category','comments' => function ($query) {
                            $query->where('status', 'active');
                        }])
        ->where('status', 'active')->orderBy('id', 'asc')->get();
        $blog_categories = BlogCategory::where('status', 'active')->orderBy('id', 'asc')->get();
        return view('frontend.blog', compact('blogs', 'blog_categories'));
    }
    public function blog_view($slug)
    {

        $blog = Blog::with(['blog_category','comments' => function ($query) {
                            $query->where('status', 'active');
                        }])
            ->where('slug', $slug)
            ->firstOrFail();
        $recent_blogs = Blog::where('status', 'active')
                            ->orderBy('id', 'desc')->take(5)->get();
//        $comments = Comment::where('status', 'active')->orderBy('id', 'asc')->get();
        return view('frontend.blog_view', compact('blog', 'recent_blogs'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactSend(Request $request)
    {
        $validatedata = $request->validate([
            'name'                  =>'required',
            'subject'               =>'required',
            'email'                 =>'required',
            'message'               =>'required|min:30'
        ]);

        if(Contact::create($validatedata)){

            Mail::to(get_setting('site_email'))->send(new ContactMail($validatedata));
            return redirect()->route('contact')
                ->with('successContactMessage', 'Thanks for contacting with us.We will knock you within 24 hours!');
        }
        return redirect()->route('contact')->with('errorContactMessage', 'An error has occurred please try again later!');
    }
}
