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

    public static function defaultLiked($post, $user_auth_id)
    {
      // $defaultLiked = $post->likes->where('user_id', $user_auth_id)->first();

      $defaultLiked = 0;
      foreach ($post['likes'] as $key => $like) {
          if($like['user_id'] == $user_auth_id) {
            $defaultLiked = 1;
            break;
          }
      }

      if(count($defaultLiked) == 0) {
            $defaultLiked == false;
        } else {
            $defaultLiked == true;
        }

      return $defaultLiked;
    }

}
