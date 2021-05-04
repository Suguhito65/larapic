@extends('layouts.app')
@section('title', '新規投稿ページ')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
        <div class="card-header text-center bg-dark text-white" for="exampleFormControlTextarea1" style="font-size: 1.5em">新規投稿</div>
            <form action="/posts" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <p class="card-text">
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3" placeholder="#(半角)を頭につけるとタグ付けできます"></textarea>
                    </p>
                    <p class="card-text">
                        <input type="file" name="image_url">
                        <!-- @if ($errors->has('image_url'))
                            <div class="text-danger">{{ $errors->first('image_url') }}</div>
                        @endif -->
                    </p>
                    <div class="text-center mt-3">
                        <input class="btn btn-primary mt-3" type="submit" value="投稿する">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection