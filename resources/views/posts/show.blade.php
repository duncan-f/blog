@extends('layouts.app')

@section('title', "$post->title")

@section('content')
  <div class="col-md-10 offset-md-1">
	<div class="blog-post">
    <div class="d-flex justify-content-between">
		<div>
			<h2 class="blog-post-title">{{ $post->title }}</h2>
			<p class="blog-post-meta">
			{{ __('Published') }} {{ $post->created_at->diffForHumans() }}, by
			<a href="#">{{ $post->user->name }}</a>
			</p>
		</div>
		<div>
		@can('update', $post)
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary">{{ __('Update') }}</a>
		@endcan
		@can('delete', $post)
			<form action="{{ route('posts.destroy', $post) }}" method="POST" class="mt-4 d-inline">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">{{ __('Delete') }}</button>
			</form>
		@endcan
		</div>
    </div>
    @markdown($post->body)
	</div>
	<h3 class="display-5 mb-4">{{ __($post->comments->count() . ' Comments') }}</h3>
	<form action="{{ route('comments.store') }}" method="POST">
		@csrf
		<input type="hidden" name="post_id" value="{{ $post }}">
		<div class="form-group">
			<textarea name="comment" class="form-control @error('comment') is-invalid @enderror" placeholder="Type your comment"></textarea>
		@error('comment')
			<div class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</div>
		@enderror
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-outline-secondary">Comment</button>
		</div>
	</form>
	@forelse($post->comments as $comment)
		<div class="mb-3">
			<div><strong>{{ $comment->user->name }}</strong> <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></div>
			{{ Str::limit($comment->comment, 150) }}
			@auth
			<div class="mb-2">
			  <a data-toggle="collapse" href="#collapse{{ $comment }}" role="button" aria-expanded="false" aria-controls="collapse{{ $comment }}">
	{{ __('Reply') }}
			  </a>
			</div>
			<div class="collapse" id="collapse{{ $comment }}">
	<form action="{{ route('reply.add') }}" method="POST" class="ml-5">
		@csrf
		<input type="hidden" name="comment_id" value="{{ $comment }}">
		<div class="form-group">
			<textarea name="reply" class="form-control @error('reply') is-invalid @enderror" placeholder="Type your comment"></textarea>
		@error('reply')
			<div class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</div>
		@enderror
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-outline-secondary">{{ __('Reply') }}</button>
		</div>
	</form>
		@endauth
			</div>
			@foreach($comment->comments as $reply)
				<div class="ml-5">
					<strong>{{ $reply->user->name }}</strong> <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
				</div>
				<div class="ml-5 mb-1">{{ $reply->comment }}</div>
			@endforeach
		</div>
	@empty
		<p>{{ __('Be the first to comment.') }}</p>
	@endforelse
  </div>
@endsection
