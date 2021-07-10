<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = request('q');
        $posts = Post::where('title', 'like', "%$query%")
                    ->orWhere('body', 'like', "%$query%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'     =>  'required|min:3',
            'body'      =>  'required|min:3',
        ];

        $request['slug'] = Str::slug($request->title, '-');

        $this->validate($request, $rules);

        $post = auth()->user()->posts()->create($request->all());

        return redirect()->route('posts.show', $post)->with('success', __('Your post has been created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
		$this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
		$this->authorize('update', $post);
        $rules = [
            'title'     =>  'required|min:3',
            'body'      =>  'required',
        ];

        $request['slug'] = Str::slug($request->title, '-');

        $this->validate($request, $rules);

        $post->update($request->all());

        return redirect()->route('posts.show', $post)->with('success', __('Your post has been updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
		$this->authorize('delete', $post);

        $post = Post::findOrFail($post->id);
        $post->delete();

        return redirect('posts')->with('success', __('Your post has been deleted successfully.'));
    }
}
