@extends('layouts.app')
@section('title', '詳細ページ')

@section('content')
    <div class="container">
        <div class="row">
            <!-- メイン -->
            <div class="col-10 col-md-6 offset-1 offset-md-3">
                <div class="card">
                    <div class="card-header">
                    {{ $post->id }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->body }}</p>
                        <div class="card-footer bg-transparent"><span class="font-weight-bold">by:</span> {{ $user->name }}</div>
                        @if ($image_url)
                            <p><img src="/{{ $image_url }}" width="300px" height="300px"></p>
                        @endif
                        @auth
                            <a href="{{ url('posts/edit/'.$post->id) }}" class="btn btn-dark">編集する</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection