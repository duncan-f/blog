@extends('layouts.app')

@section('title')
| {{ __('All Posts') }}
@endsection

@section('content')
<div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom">
        {{ __('Website description here') }}
    </h3>
@forelse($posts as $post)
    <div class="blog-post mb-4">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ __('Published') }} {{ $post->created_at->diffForHumans() }}, by <a href="#">Mark</a></p>

        <p>{{ str_limit($post->body, 350) }}</p>
        <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-secondary">{{ __('Read more') }}</a>
    </div><!-- /.blog-post -->
@empty
    <h2 class="display-2">{{ __('No posts found.') }}</h2>
@endforelse
{{ $posts->appends(['q' => request('q')])->links() }}
</div><!-- /.blog-main -->

@include('partials.sidebar')
@endsection


                
                

                