@extends('layouts.app')

@section('title', config('app.name', 'Laravel'))
@section('home')
@include('partials.nav-categories')
@if($last)
  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">{{ $last->title }}</h1>
      <p class="lead my-3">{!! Str::limit(Markdown::convertToHtml($last->body), 150) !!}</p>
      <p class="lead mb-0"><a href="{{ route('posts.show', $last) }}" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>
@endif
@if($categories->count() > 0)
  <div class="row mb-2">
	<!-- First card -->
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
	<!-- end of First card -->
	<!-- Second card -->
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
	<!-- end of Second card -->
  </div>
@endif
</div>

@endsection

@section('content')
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        From the Firehose
      </h3>
	@forelse($posts as $post)
	  <div class="mb-2">
		<h4 class="display-4">{{ $post->title }}</h4>
		<p class="blog-post-meta">
		{{ __('Published') }} {{ $post->created_at->diffForHumans() }}, by
		<a href="#">{{ $post->user->name }}</a>
		</p>
		<p>{!! Str::limit(Markdown::convertToHtml($post->body), 200) !!}</p>
		<a href="{{ route('posts.show', $post) }}" class="streched-link">Continue reading...</a>
	  </div>
	@empty
		<h3 class="display-4">Website's empty try to put some posts.</h3>
	@endforelse
    </div><!-- /.blog-main -->

	@include('partials.sidebar')
@endsection
