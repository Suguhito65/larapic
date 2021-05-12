<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;

class LikeController extends Controller
{
    public function like(Post $post, Request $request)
    {
        $request->user_id
        $like = Like::create(['user_id' => $request->])
    }
}
