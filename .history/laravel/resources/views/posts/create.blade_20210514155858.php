@extends('layouts.app')
@section('title', '新規投稿ページ')
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        @include('layouts.error')
        <div class="card shadow">
            <h3 class="card-header text-center text-white" for="exampleFormControlTextarea1" style="background: linear-gradient(45deg, #ffa500, #f00, #ffa500)">新規投稿</h3>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <p class="card-text">
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3" placeholder="#(半角)を頭につけるとタグになります。(例)ピカチュウ #ポケモン"></textarea>
                    </p>
                    <p class="card-text">
                        <input type="file" name="image_url">
                    </p>
                    <div class="text-center mt-3">
                        <input class="btn btn-primary mt-3 px-4" style="border-radius: 1.2em" type="submit" value="投稿する">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection