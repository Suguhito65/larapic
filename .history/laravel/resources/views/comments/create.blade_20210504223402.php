@extends('layouts.app')
@section('title', 'コメント投稿ページ')
@section('content')
@in
<div class="row">
    <div class="col-10 col-md-6 offset-1 offset-md-3">
        <div class="card">
        <div class="card-header text-center bg-dark text-white" for="exampleFormControlTextarea1" style="font-size: 1.5em">コメント投稿</div>
            <form action="{{ route('comments.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <p class="card-text">
                        <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
                        @if ($errors->has('comment'))
                            <div class="text-danger">{{ $errors->first('comment') }}</div>
                        @endif
                    </p>
                    <div class="text-center mt-3">
                        <input class="btn btn-primary mt-3" style="width:100%" type="submit" value="コメントする">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="post_id" value="{{ $post_id }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection