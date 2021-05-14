@extends('layouts.app')
@section('title', 'コメント投稿ページ')
@section('content')
<div class="row">
    <div class="col-10 col-md-6 offset-1 offset-md-3">
        @include('layouts.error')
        <div class="card">
            <h3 class="card-header text-center text-white" for="exampleFormControlTextarea1" >コメント投稿</h3>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <p class="card-text">
                        <textarea class="form-control" name="comment" id="comment" rows="5" placeholder="他の人が不快に思うコメントは控えて下さい。"></textarea>
                    </p>
                    <div class="text-center mt-3">
                        <input class="btn btn-primary mt-3 px-4" style="border-radius: 1.2em" type="submit" value="コメントする">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="post_id" value="{{ $post_id }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection