@extends('layouts.app')
@section('title', '編集ページ')
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
        <div class="card-header text-center bg-dark text-white" for="exampleFormControlTextarea1" style="font-size: 1.5em">編集</div>
            <form action="/posts/edit" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <p class="card-text">
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3" placeholder="#(半角)を頭につけるとタグ付けできます">{{$post->body}}</textarea>
                    </p>
                    <p class="card-text">
                        <input type="file" name="image_url">
                    </p>
                    <div class="text-center mt-3">
                        <input name="post_id" type="hidden" value="{{$id}}" >
                        <input class="btn btn-primary mt-3" type="submit" value="変更する">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection