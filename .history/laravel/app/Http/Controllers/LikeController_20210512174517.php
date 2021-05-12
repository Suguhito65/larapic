<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;

class LikeController extends Controller
{
    public function like(Post $post, Request $request)
    {
        $like = Like::create([
            'user_id' => $request->user_id,
            'post_id' => $post->id
        ]);
        $likeCount = Like::where
        return response()->json(['']);
    }

    public function unlike(Post $post, Request $request)
    {
        $like = Like::where('user_id', $request->user_id)->where('post_id', $post->id)->first();
        return response()->json(['']);
    }
}
