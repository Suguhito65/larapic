@extends('layouts.app')
@section('title', 'ユーザーページ')
@section('content')
<form action="{{ route('posts.search') }}" method="post" class="input-group mb-5" style="width: 60%; margin: 0 auto">
    {{ csrf_field() }}
    <input type="text" placeholder="search" name="search" value="" class="form-control">
    <button type="submit" class="btn btn-outline-primary ml-1">
        <i class="fas fa-search"></i>
    </button>
</form>

@isset($seach_result)
    <h2 class="text-center mb-3">{{ $search_result}}</h2>
@endisset

<div class="row">
    <div class="col-10 col-md-6 offset-1 offset-md-3">
        @if (session('err_msg'))
            <p class="text-danger">
                {{ session('err_msg') }}
            </p>
        @endif
        
        @foreach ($user->posts as $post)
            <div class="card mb-5">
                <div class="card-header text-center bg-dark text-white">投稿者：{{ $post->user->name }}</div>
                <div class="card-body">
                    <div class="card-title">{{ $post->body}}</div>
                    <div class="card-title">
                        タグ：
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}" class="text-dark">
                                #{{ $tag->tag_name}}　
                            </a>
                        @endforeach
                    </div>
                    <div class="text-center card-footer bg-transparent pt-3">
                        @if($post->is_liked_by_auth_user())
                            <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="btn">
                                <i class="fas fa-heart" style="color: #ee82ee"></i> {{ $post->likes->count() }}
                            </a>
                        @else
                            <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn">
                                <i class="far fa-heart" style="color: #f0f"></i> {{ $post->likes->count() }}
                            </a>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="card-link btn btn-success mb-3" style="width: 100%">詳細</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection