@extends('layouts.app')

@section('title', "$post->title")

@section('content')
<div class="col-md-8 offset-md-2">
    <h4 class="display-4">{{ __('Edit Post') }} <small>({{ $post->title }})</small></h4>

    {{ Form::open(['route' => ['posts.update', $post->id]]) }}
    @csrf
    @method('PATCH')
    <div class="form-group">
        {{ Form::label('title', __('Post Title')) }}
        {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => __('Post Title')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('body', __('Post')) }}
        {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => __('Type your post.')]) }}
    </div>

    <div class="form-group">
        {{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
    </div>
    {{ Form::close() }}
</div>
@endsection
