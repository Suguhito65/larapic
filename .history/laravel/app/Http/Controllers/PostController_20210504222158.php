<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Like;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; //画像編集の際に使用

class PostController extends Controller {
    // only()の引数内のメソッドはログイン時のみ有効
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->query();

        if(isset($q['tag_name'])) {
            $posts = Post::latest()->where('body', 'like', '%'.$q['tag_name'].'%')->paginate(3);
            $posts->load('user', 'tags');

            return view('posts.index', [
                'posts' => $posts,
                'tag_name' => $q['tag_name']
            ]);
        } else {
            $posts = Post::latest()->paginate(3);
            $posts->load('user', 'tags');

            return view('posts.index', [
                'posts' => $posts
            ]);
        }
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
    public function store(Request $request)
    {
        $rules = [
            'body' => ['required'],
            'user_id' => ['required','numeric'],
            'image_url' => ['required','file','image','mimes:jpeg,png,jpg,gif','max:2048']
        ];
        $this->validate($request, $rules);

        $id = Auth::id();
        $post = new Post();
        $post->body = $request->body;

        // ローカル
        $time = date("Ymdhis"); // 2020(年)01(月)01(日)01(時)01(分)01(秒)
        $post->image_url = $request->image_url->storeAs('public/post_images', $time.'_'.Auth::user()->id. '.jpg'); // 20200101010101_1.jpg
        // $image = $request->file('image_url');
        // $path = Storage::disk('s3')->putFile('/', $image, 'public');
        // $post->image_url = $path;
        $post->user_id = $id;

        // bodyからtagを抽出
        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->body, $match);
        $tags = [];
        foreach($match[1] as $tag) {
            // すでに存在するtagは作られない
            $found = Tag::firstOrCreate(['tag_name' => $tag]);
            array_push($tags, $found);
        }
        $tag_ids = [];
        foreach($tags as $tag) {
            array_push($tag_ids, $tag['id']);
        }

        $post->save();
        // タグを追加
        $post->tags()->attach($tag_ids);

        \Session::flash('err_msg', '登録しました。');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load('user', 'comments.user'); // コメントをしたユーザー情報を取得
        return view('posts.show', [
            'post' => $post,
            // ローカル
            'image_url' => str_replace('public/', 'storage/', $post->image_url) // 画像表示（ローカル）
            // 'image_url' => $post->image_url
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
        $this->authorize('edit', $post); // 認可
        return view('posts.edit', [
            'post' => $post,
            'id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->post_id;
        $post = Post::findOrFail($id);
        $this->authorize('edit', $post); // 認可
        $post->body = $request->body;

        if($request->hasFile('image_url')) {
            // ローカル
            Storage::delete('public/post_images/' . $post->image_url); // 画像削除
            $time = date("Ymdhis");
            $post->image_url = $request->image_url->storeAs('public/post_images', $time.'_'.Auth::user()->id. '.jpg');
            // $image = $request->image_url;
            // Storage::disk('s3')->delete($image);
            // $path = Storage::disk('s3')->putFile('/', $image, 'public');
            // $post->image_url = $path;
        }

        // bodyからtagを抽出
        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->body, $match);
        $tags = [];
        foreach($match[1] as $tag) {
            // すでに存在するtagは作られない
            $found = Tag::firstOrCreate(['tag_name' => $tag]);
            array_push($tags, $found);
        }
        $tag_ids = [];
        foreach($tags as $tag) {
            array_push($tag_ids, $tag['id']);
        }

        $post->save();
        // タグを更新
        $post->tags()->sync($tag_ids);

        \Session::flash('err_msg', '更新しました。');
        
        return redirect('/');
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
        $this->authorize('edit', $post); // 認可
        $post->delete();

        \Session::flash('err_msg', '削除しました。');

        return redirect('/');
    }

    // いいね機能
    /**
     * 引数のIDに紐づくリプライにLIKEする
     *
     * @param $id リプライID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function like($id)
    {
        Like::create([
        'post_id' => $id,
        'user_id' => Auth::id(),
        ]);
        return redirect()->back();
    }
    // いいねを外す
    /**
     * 引数のIDに紐づくリプライにUNLIKEする
     *
     * @param $id リプライID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        return redirect()->back();
    }

    // 検索機能
    public function search(Request $request)
    {
        $posts = Post::where('body', 'like', '%'.$request->search.'%')->paginate(3);
        $search_result = $request->search.'の検索結果は'.$posts->total().'件';
        return view('posts.index', [
            'posts' => $posts,
            'search_result' => $search_result,
            'search_query'  => $request->search
        ]);
    }
}
