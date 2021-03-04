@extends('layouts.app')
@section('title', 'トップページ')
@section('content')
    <div class="container">
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
                        <tr>
                            <th>ID</th>
                            <th colspan="3">内容</th>
                        </tr>
                        
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->body }}</td>
                                <td>
                                    @if($post->is_liked_by_auth_user())
                                        <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                                    @else
                                        <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('posts/'.$post->id) }}" class="btn btn-success">詳細</a>
                                    @can('edit', $post)
                                        <form action="/posts/delete/{{$post->id}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="submit" value="削除" class="btn btn-danger">
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
@endsection