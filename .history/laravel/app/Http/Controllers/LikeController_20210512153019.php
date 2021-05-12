<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class LikeController extends Controller
{
    public function like(Post $post, Request $)
    {
        dd(22);
    }
}
