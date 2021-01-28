<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; //画像編集の際に使用
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $id = Auth::id();
        // インスタンス作成
        $post = new Post();

        $post->body = $request->body;
        $time = date("Ymdhis"); // 2020(年)01(月)01(日)01(時)01(分)01(秒)
        $post->image_url = $request->image_url->storeAs('public/post_images', $time.'_'.Auth::user()->id. '.jpg'); // 20200101010101_1.jpg
        $post->user_id = $id;

        $post->save();

        \Session::flash('err_msg', '登録しました。');

        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user_id = $post->user_id;
        $user = DB::table('users')->where('id', $user_id)->first();

        return view('posts.detail', [
            'post' => $post,
            'user' => $user,
            'image_url' => str_replace('public/', 'storage/', $post->image_url)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request)
    {
        $id = $request->post_id;
        //レコードを検索
        $post = Post::findOrFail($id);
        $post->body = $request->body;

        if($request->hasFile('image_url'))
        {
            Storage::delete('public/post_images/' . $post->image_url);
            $time = date("Ymdhis");
            $post->image_url = $request->image_url->storeAs('public/post_images', $time.'_'.Auth::user()->id. '.jpg'); 
        }
        
        //保存（更新）
        $post->save();

        \Session::flash('err_msg', '更新しました。');
        
        return redirect()->to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // 削除
        $post->delete();

        \Session::flash('err_msg', '削除しました。');

        return redirect()->to('/');
    }
}
