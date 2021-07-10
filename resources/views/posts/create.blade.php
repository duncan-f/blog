@extends('layouts.app')

@section('title', __('Create New Post'))

@section('content')
<div class="col-md-8 offset-md-2">
    <h4 class="display-4">{{ __('New Post') }}</h4>

    {{ Form::open(['route' => 'posts.store']) }}
    @csrf
    <div class="form-group">
        {{ Form::label('title', __('Post Title')) }}
		<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="{{ __('Post Title') }}" />
		@error('title')
		<div class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</div>
		@enderror
    </div>

    <div class="form-group">
        {{ Form::label('body', __('Post')) }}
		<textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" placeholder="{{ __('Type your post') }}" cols="50" rows="10"></textarea>
		@error('body')
		<div class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</div>
		@enderror
    </div>

    <div class="form-group">
        {{ Form::submit(__('Publish'), ['class' => 'btn btn-success']) }}
    </div>
    {{ Form::close() }}
</div>
@endsection
