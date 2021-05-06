@extends('layouts.app')
@section('title', '新規登録')
@section('content')
@include('layouts.error')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-white text-center" style="background:font-size: 1.5em">{{ __('新規登録') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="">{{ __('名前') }}</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email" class="">{{ __('メールアドレス') }}</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="@が必須です">
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('パスワード') }}</label>
                        <input id="password" type="password" class="form-control" name="password" autocomplete="new-password" placeholder="6文字以上です">
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="">{{ __('パスワード再入力') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4">
                            {{ __('新規登録') }}
                        </button>
                    </div>
                    <a class="nav-link text-right" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
