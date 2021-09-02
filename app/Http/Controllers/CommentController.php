<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function store(Request $request)
	{
		$rules = [
			'comment' => 'required|min:3',
		];

		$this->validate($request, $rules);

		$comment = new Comment;
		$comment->comment = $request->comment;
		$comment->user()->associate($request->user());

		$post = Post::find($request->post_id);
		$post->comments()->save($comment);

		return back()->with('success', __('Comment added successfully.'));
	}

	public function replyStore(Request $request)
	{
		$rules = [
			'reply' => 'required|min:3',
		];

		$this->validate($request, $rules);

		$reply = new Comment;
		$reply->comment = $request->reply;
		$reply->user()->associate($request->user());

		$comment = Comment::find($request->comment_id);
		$comment->comments()->save($reply);

		return back()->with('success', __('Replied successfully.'));
	}

	public function edit()
	{
		//
	}

	public function destroy()
	{
		//
	}
}
