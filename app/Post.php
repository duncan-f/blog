<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body'
    ];

    public function createSlug()
    {
        
    }

    public function user()
    {
        //return $this->belongsToMany('App\User', 'post_users', 'post_id', 'user_id');
        return $this->belongsTo('App\User');
    }
}
