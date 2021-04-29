@extends('layouts.app')
@section('title', 'トップページ')
@section('content')
<div class="container">
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
            
            @foreach ($posts as $post)
                <div class="card mb-5">
                    <div class="card-header text-center">
                        <a href="{{ route('users.show', $post->user_id) }}" class="text-dark">
                            {{ $post->user->name }}
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="card-title">{{ $post->body }}</div>
                        <div class="text-right card-footer bg-transparent">
                            
                        </div>
                        <div class="text-center">
                            @if($post->is_liked_by_auth_user())
                                <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                            @else
                                <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                            @endif
                        </div>
                        <div>
                        <div class="">
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="card-link btn btn-success my-3" style="width: 100%">詳細</a>
                        </div>
                        <div>
                            @can('edit', $post)
                                <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="delete btn btn-danger" style="width: 100%">削除</button>
                                </form>
                            @endcan
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection