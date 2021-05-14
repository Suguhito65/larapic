@extends('layouts.app')
@section('title', 'トップページ')
@section('content')
@include('posts.search')

<div class="row">
    @foreach ($posts as $post)
        @include('posts.card')
    @endforeach
</div>
<!-- ページネーション -->
<div class="d-flex justify-content-center">
    @if(isset($tag_name))
        {{ $posts->appends(['tag_name' => $tag_name])->links() }}
    @elseif(isset($search_query))
        {{ $posts->appends(['search' => $search_query])->links() }}
    @else
        {{ $posts->links() }}
    @endif
</div>
@endsection