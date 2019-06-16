@extends('layouts.app')

@section('title', "| $post->title")

@section('content')
<div class="col-md-8 offset-md-2">
    <h4 class="display-4">{{ $post->title }}</h4>
    <p><small>{{ __('Published') }} {{ $post->created_at->diffForHumans() }}</small></p>
    <div class="mb-4">
        
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-secondary">{{ __('Update') }}</a>
            @method('DELETE')
            @csrf
            <input type="submit" value="{{ __('Delete') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
        </form>
    </div>
    <p>{{ $post->body }}</p>
</div>
@endsection