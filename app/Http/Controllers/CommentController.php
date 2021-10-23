<?php

namespace App\Http\Controllers;

use App\Model\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:developer|super admin|master|global|comment view'],   ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|comment create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|comment edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:developer|super admin|master|global|comment delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.blog_view');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

            $validatedData = $request->validate([
                'name'        => 'required',
                'body'        => 'required'
            ]);


        try {
            $comment = new Comment();
            $comment->create($validatedData);

            return redirect()->route('frontend.blog_view')->with('successMessage', 'Comment successfully created!');

        } catch (\Exception $ex) {
            \Artisan::call('cache:clear');
            return redirect()->route('frontend.blog_view')->with('errorMessage', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
         $validatedData = $request->validate([
            'status'       => 'required',
            'name'         => 'required',
            'body'         => 'required'
        ]);
        $validatedData['read_status'] = 'read';
        try {
                $comment->update($validatedData);
                return redirect()->route('comment.edit', $comment->id)->with('successMessage', 'Comment successfully updated!');
            } catch (\Exception $ex) {
                \Artisan::call('cache:clear');
                return redirect()->route('comment.index')->with('errorMessage', $ex->getMessage());
            }



            return redirect()->route('comment.edit', $comment->id)->with('successMessage', 'Comment successfully updated!');

//         catch (\Exception $ex) {
            \Artisan::call('cache:clear');
            return redirect()->route('comment.index')->with('errorMessage', $ex->getMessage());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->delete())
        {
            return redirect()->route('comment.index')->with('successMessage', 'Comment successfully deleted!');
        }
    }
}
