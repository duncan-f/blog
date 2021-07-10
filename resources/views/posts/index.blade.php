@extends('layouts.app')

@section('title', __('All Posts'))

@section('content')
  <div class="col-md-8 blog-main">
@forelse($posts as $post)
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
		<p class="blog-post-meta">
		{{ __('Published') }} {{ $post->created_at->diffForHumans() }}, by
		<a href="#">{{ $post->user->name }}</a>
		</p>

        <div>{!! Str::limit(Markdown::convertToHtml($post->body), 350) !!}</div>
		<a href="{{ route('posts.show', $post) }}" class="streched-link">
			{{ __('Continue Reading...') }}
		</a>
    </div><!-- /.blog-post -->
@empty
    <h2 class="display-2">{{ __('No posts found.') }}</h2>
@endforelse
{{-- $posts->appends(['q' => request('q')])->links() --}}
@include('partials.pagination.posts', ['paginator' => $posts])
  </div><!-- blog-main -->

@include('partials.sidebar')
@endsection






