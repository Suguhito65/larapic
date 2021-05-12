@extends('layouts.app')
@section('title', 'ユーザーページ')
@section('content')

@include('posts.search')

<div class="row">
    <div class="col-10 col-md-6 offset-1 offset-md-3">
        @if (session('err_msg'))
            <p class="text-danger">
                {{ session('err_msg') }}
            </p>
        @endif
        @foreach ($posts as $post)
            @include('posts.card')
        @endforeach
        <!-- ページネーション -->
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection