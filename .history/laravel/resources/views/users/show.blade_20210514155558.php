@extends('layouts.app')
@section('title', 'ユーザーページ')
@section('content')
@include('posts.search')
<div class="row">
        @foreach ($posts as $post)
            @include('posts.card')
        @endforeach
</div>
<!-- ページネーション -->
<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
@endsection