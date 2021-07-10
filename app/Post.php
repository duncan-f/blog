<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = [];

	public function getRouteKeyName()
	{
		return 'slug';
	}

    public function user()
    {
        return $this->belongsTo(User::class);
    }

	public function comments()
	{
		return $this->morphMany(Comment::class, 'commentable')->latest();
	}
}
