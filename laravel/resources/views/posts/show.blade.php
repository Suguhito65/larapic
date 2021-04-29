@extends('layouts.app')
@section('title', '詳細ページ')
@section('content')
    <div class="container">
        <div class="row">
            <!-- メイン -->
            <div class="col-10 col-md-6 offset-1 offset-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <a href="{{ route('users.show', $post->user_id) }}" class="text-dark">
                            {{ $post->user->name }}
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->body }}</p>
                        <div class="text-right card-footer bg-transparent">
                            @if ($image_url)
                                <!-- ローカル -->
                                <p class="text-center"><img class="img-fluid" src="/{{ $image_url }}"></p>
                                <!-- <p class="text-center"><img class="img-fluid" src="https://larapic65.s3.ap-northeast-1.amazonaws.com/{{ $image_url }}"></p> -->
                            @endif
                        </div>
                        <div class="text-center">
                            @if($post->is_liked_by_auth_user())
                                <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">
                                    いいね<span class="badge">{{ $post->likes->count() }}</span>
                                </a>
                            @else
                                <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">
                                    いいね<span class="badge">{{ $post->likes->count() }}</span>
                                </a>
                            @endif
                        </div>
                        @can('edit', $post)
                            <div class="text-center">
                                <a href="{{ url('posts/edit/'.$post->id) }}" class="btn btn-success mt-3" style="width: 100%">編集する</a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header text-center bg-dark text-white">コメント一覧</div>
                    <div class="p-3">
                        @foreach($post->comments as $comment)
                            <div class="card mb-1">
                                <div class="card-body">
                                    <p class="card-text">{{ $comment->comment }}</p>
                                    <div class="text-right">  
                                        <a href="{{ route('users.show', $comment->user->id) }}" class="text-dark">
                                            <span class="font-weight-bold">by</span> {{ $comment->user->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center mt-3">
                            <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="btn btn-success mb-1" style="width: 100%">
                                コメント投稿
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection