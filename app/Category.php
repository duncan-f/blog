<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = [];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function categorizeable()
	{
		return $this->morphTo();
	}

	public function post()
	{
		return $this->morphMany(Post::class);
	}

	public function categories()
	{
		return $this->morphMany(Category::class, 'categorizeable');
	}
}
