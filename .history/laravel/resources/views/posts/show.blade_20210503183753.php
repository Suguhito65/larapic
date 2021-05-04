@extends('layouts.app')
@section('title', '詳細ページ')
@section('content')
<div class="row">
    <div class="col-10 col-md-6 offset-1 offset-md-3">
        <div class="card">
            <div class="card-header text-center bg-secondary">
                <a href="{{ route('users.show', $post->user_id) }}" class="text-white btn">
                    <span class="font-weight-bold">投稿者：</span>{{ $post->user->name }}
                </a>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <span class="font-weight-bold">内容：</span>{{ $post->body }}
                </p>
                <div class="card-title">
                    <span class="font-weight-bold">タグ：</span>
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}" class="text-dark btn">
                            #{{ $tag->tag_name}}
                        </a>
                    @endforeach
                </div>
                <div class="card-footer bg-transparent">
                    @if ($image_url)
                        <!-- ローカル -->
                        <p class="text-center"><img class="img-fluid" src="/{{ $image_url }}"></p>
                        <!-- <p class="text-center"><img class="img-fluid" src="https://larapic65.s3.ap-northeast-1.amazonaws.com/{{ $image_url }}"></p> -->
                    @endif
                </div>
                <div class="text-center">
                    @if($post->is_liked_by_auth_user())
                        <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="btn">
                            <i class="fas fa-heart" style="color: #ee82ee"></i> {{ $post->likes->count() }}
                        </a>
                    @else
                        <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn">
                            <i class="far fa-heart" style="color: #ee82ee"></i> {{ $post->likes->count() }}
                        </a>
                    @endif
                </div>
                @can('edit', $post)
                    <div class="row justify-content-around mt-3">
                        <a href="{{ route('posts.edit',['id' => $post->id]) }}" class="btn btn-success">編集</a>
                    
                        <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="delete btn btn-danger">削除</button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header text-center bg-dark text-white">コメント一覧</div>
            <div class="p-3">
                @foreach($post->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row justify-content-between px-3">
                                <p class="card-text">{{ $comment->comment }}</p>
                                <div>  
                                    <a href="{{ route('users.show', $comment->user->id) }}" class="text-dark btn">
                                        <span class="font-weight-bold">by</span> {{ $comment->user->name }}
                                    </a>
                                </div>
                            </div>
                            @can('edit', $comment)
                                <div class="card-footer bg-transparent text-right pt">
                                    <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="post">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <button type="submit" class="delete btn btn-danger btn-sm">削除</button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </div>
                @endforeach
                <div class="text-center mt-3">
                    <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="btn btn-primary mb-1">
                        コメント投稿
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection