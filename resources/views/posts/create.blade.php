@extends('layouts.app')

@section('title')
| {{ __('Create New Post') }}
@endsection

@section('content')
<div class="col-md-8 offset-md-2">
    <h3 class="display-3">{{ __('New Post') }}</h3>

    {{ Form::open(['route' => 'posts.store']) }}
    @csrf
    <div class="form-group">
        {{ Form::label('title', __('Post Title')) }}
        {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Post Title')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('body', __('Post')) }}
        {{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => __('Type your post.')]) }}
    </div>

    <div class="form-group">
        {{ Form::submit(__('Publish'), ['class' => 'btn btn-success']) }}
    </div>
    {{ Form::close() }}
</div>
@endsection