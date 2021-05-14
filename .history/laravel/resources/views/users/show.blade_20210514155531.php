@extends('layouts.app')
@section('title', 'ユーザーページ')
@section('content')
@include('posts.search')
<div class="row">
    <div class="col-10 col-md-6 offset-1 offset-md-3">
        @foreach ($posts as $post)
            @include('posts.card')
        @endforeach
        
    </div>
</div>
@endsection