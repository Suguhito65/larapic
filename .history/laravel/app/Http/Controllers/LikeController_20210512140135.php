<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class LikeController extends Controller
{
    public function like(Request $request, Post $post)
    {
        dd($request)
    }
}
