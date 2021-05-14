@extends('layouts.app')
@section('title', 'トップページ')
@section('content')
@include('posts.search')
<div class="row">
    @if (session('err_msg'))
        <p class="alert alert-danger text-center">
            {{ session('err_msg') }}
        </p>
    @endif 
    @foreach ($posts as $post)
        @include('posts.card')
    @endforeach
    <!-- ページネーション -->
</div>
@endsection