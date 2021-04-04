@extends('layouts.app')
@section('title', '詳細ページ')
@section('content')
    <div class="container">
        <div class="row">
            <!-- メイン -->
            <div class="col-10 col-md-6 offset-1 offset-md-3">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                    {{ $post->id }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->body }}</p>
                        <div class="text-right card-footer bg-transparent"><span class="font-weight-bold">by</span> {{ $user->name }}</div>
                        @if ($image_url)
                            <!-- ローカル -->
                            <!-- <p class="text-center"><img class="img-fluid" src="/{{ $image_url }}" width="250px" height="250px"></p> -->
                            <p class="text-center"><img class="img-fluid" src="https://larapic65.s3.ap-northeast-1.amazonaws.com/{{ $image_url }}"></p>
                        @endif
                        <div>
                            @if($post->is_liked_by_auth_user())
                                <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                            @else
                                <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                            @endif
                        </div>
                        @can('edit', $post)
                            <div class="text-center">
                                <a href="{{ url('posts/edit/'.$post->id) }}" class="btn btn-dark">編集する</a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection