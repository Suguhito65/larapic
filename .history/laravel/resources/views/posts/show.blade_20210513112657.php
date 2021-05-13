@extends('layouts.app')
@section('title', '詳細ページ')
@section('content')
<div class="row">
    <div class="col-10 col-md-6 offset-1 offset-md-3">
        @if (session('err_msg'))
            <p class="alert alert-danger text-center">
                {{ session('err_msg') }}
            </p>
        @endif
        <div class="card">
            <div class="card-body" style="background: #fafafa">
                <div class="card-title">
                    <i class="fas fa-user-circle"></i><span class="font-weight-bold"> 投稿者</span>
                    <a href="{{ route('users.show', $post->user_id) }}" class="text-dark btn">
                        {{ $post->user->name }}
                    </a>
                </div>
                <div class="card-title text-break">
                    <i class="fas fa-comment-dots"></i>
                    <span class="font-weight-bold"> 投稿　</span>{{ $post->body }}
                </div>
                <div class="card-title">
                    <i class="fas fa-tag"></i><span class="font-weight-bold"> タグ</span>
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}" class="text-dark btn">
                            {{ $tag->tag_name}}
                        </a>
                    @endforeach
                </div>
                <div class="card-footer bg-transparent">
                    @if ($image_url)
                        <!-- ローカル -->
                        <!-- <p class="text-center"><img class="img-fluid" src="/{{ $image_url }}"></p> -->
                        <p class="text-center"><img class="img-fluid" src="https://larapic65.s3.ap-northeast-1.amazonaws.com/{{ $image_url }}"></p>
                    @endif
                </div>
                <div class="text-center"></div>
                @if($post->is_liked_by_auth_user())
                    <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                @else
                    <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                @endif
                @can('edit', $post)
                    <div class="row justify-content-around mt-3">
                        <a href="{{ route('posts.edit',['id' => $post->id]) }}" class="btn btn-success px-4" style="border-radius: 1.2em">編集</a>
                        <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="delete btn btn-danger px-4" style="border-radius: 1.2em">削除</button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
        <div class="card mt-3" style="background: #fafafa">
            <div class="card-header text-center bg-dark text-white"><i class="fas fa-comment-alt"></i> コメント一覧</div>
            <div class="p-3">
                @foreach($post->comments as $comment)
                    <div class="card">
                        <div class="card-body">
                            <div class="pb-3">
                                <p class="card-text text-break">{{ $comment->comment }}</p>
                            </div>
                            @can('edit', $comment)
                                <div class="text-right">
                                    <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="post">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <button type="submit" class="delete btn btn-sm">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </div>
                    <div class="text-right mb-3">  
                        <a href="{{ route('users.show', $comment->user->id) }}" class="text-dark btn">
                        <i class="fas fa-user-circle"></i> {{ $comment->user->name }}
                        </a>
                    </div>
                @endforeach
                <div class="text-center mt-3">
                    <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="btn btn-primary px-4 mb-1" style="border-radius: 1.2em">
                        コメント投稿
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection