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
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
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

    public function defaultLiked($post, $user_auth_id)
    {
      $defaultLiked = $post->likes->where('user_id', $user_auth_id)->first();

      if(isset($defaultLiked) == 0) {
            $defaultLiked == false;
        } else {
            $defaultLiked == true;
        }

      return $defaultLiked;
    }

    // /**
    // * リプライにLIKEを付いているかの判定
    // *
    // * @return bool true:Likeがついてる false:Likeがついてない
    // */
    // public function is_liked_by_auth_user()
    // {
    //     $id = Auth::id();
    //     $likers = array();
    //     foreach($this->likes as $like) {
    //     array_push($likers, $like->user_id);
    //     }
    //     if (in_array($id, $likers)) {
    //     return true;
    //     } else {
    //     return false;
    //     }
    // }
}
