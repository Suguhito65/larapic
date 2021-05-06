@extends('layouts.app')
@section('title', 'ログイン')
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        @include('layouts.error')
        <div class="card">
            <div class="card-header bg-dark text-white text-center" style="font-size: 1.5em">{{ __('ログイン') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="">{{ __('メールアドレス') }}</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="@が必須です">
                    </div>
                    <div class="form-group">
                        <label for="password" class="">{{ __('パスワード') }}</label>
                        <input id="password" type="password" class="form-control" name="password" autocomplete="current-password" placeholder="6文字以上です">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4">
                            {{ __('ログイン') }}
                        </button>
                    </div>
                </form>
                <a class="nav-link text-right" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                <div class="form-group row mt-2">
                    <div class="col-md-8 offset-md-4">
                        <a href="/login/google" class="btn" role="button" style="">
                        <i class="fab fa-google"></i>　Google Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
