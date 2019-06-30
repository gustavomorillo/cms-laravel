<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Photo;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        $posts = Post::paginate(3);
        $categories = Category::all();

        return view('index', compact('posts', 'categories'));
    }

    public function post($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::all();

        $user = $post->user;

        $comments = $post->comments()->where('is_active', 1)->get();

        return view('post', compact('post', 'comments', 'user', 'categories'));
    }
    
    
        // return view('home');
    
}
