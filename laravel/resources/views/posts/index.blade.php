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
            <!-- メイン -->
            <div class="col-10 col-md-8 offset-1 offset-md-2">
                @if (session('err_msg'))
                    <p class="text-danger">
                        {{ session('err_msg') }}
                    </p>
                @endif
                <table class="table table-striped">
                    <tbody>
                        <tr class="bg-dark text-white">
                            <th>ID</th>
                            <th colspan="3">内容</th>
                            <th></th>
                        </tr>

                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->body }}</td>
                                <td>
                                    @if($post->is_liked_by_auth_user())
                                        <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                                    @else
                                        <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-success">詳細</a>
                                </td>
                                <td>
                                    @can('edit', $post)
                                        <form action="/posts/delete/{{$post->id}}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger" id="delete">削除</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection