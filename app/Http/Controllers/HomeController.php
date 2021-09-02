<?php

namespace App\Http\Controllers;

use App\Post;
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
        //$this->middleware('guest');
        //$this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$posts = Post::latest()->take(5)->get();
		//$posts = Post::orderBy('created_at', 'DESC')->take(5)->get();
		$last = Post::latest()->first();
		$categories = Category::all();
        return view('home', compact('posts', 'last', 'categories'));
    }
}
