<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; // ユーザーIDを取得するため

class Post extends Model
{
    protected $fillable = [
        'id', 'user_id', 'body', 'image_url'
    ];

    public function user() {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(\App\Comment::class, 'post_id', 'id');
    }

    public function likes() {
        return $this->hasMany('App\Like', 'post_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

}
