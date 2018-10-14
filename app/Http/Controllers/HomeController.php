<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::where('user_id', Auth::id())->get();
        return view('home', [
            'posts' => $posts,
        ]);
    }

    public function create(Request $request)
    {
        $post = new post();
        $post->body = $request['post_body'];
        $post->user_id = Auth::id();
        $post->save();
        return redirect()->back()->with('status', 'Post created successfully !');
    }

    public function delete(Request $request)
    {
        $post_id = $request['id'];
        post::where('id', $post_id)->delete();
        return redirect()->back()->with('status', 'Post deleted !');
    }

    public function edit_page(Request $request)
    {
        $post = post::where('id', $request['id'])->first();
        return view('edit', [
            'post' => $post,
        ]);
    }

    public function edit(Request $request)
    {
        $content = $request['body'];
        post::where('id', $request['id'])->update([
            'body' => $content,
        ]);
        return redirect()->route('home')->with('status', 'Post updated successfully !');
        
    }
}
