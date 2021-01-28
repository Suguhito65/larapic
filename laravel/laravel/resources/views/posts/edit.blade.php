@extends('layouts.app')

@section('title', '編集ページ')
@section('content')
    <div class="row">
        <!-- メイン -->
        <div class="col-10 col-md-6 offset-1 offset-md-3">
            <div class="card">
                <form action="/posts/edit" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <p class="card-text">
                            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">{{$post->body}}</textarea>
                            @if ($errors->has('body'))
                                <div class="text-danger">{{ $errors->first('body') }}</div>
                            @endif
                        </p>
                        <p class="card-text">
                            <input type="file" name="image_url">
                            @if ($errors->has('image_url'))
                                <div class="text-danger">{{ $errors->first('image_url') }}</div>
                            @endif
                        </p>
                        <div class="text-center mt-3">
                            <input name="post_id" type="hidden" value="{{$id}}" >
                            <input class="btn btn-dark" type="submit" value="変更する">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection