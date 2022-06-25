@extends('layouts.app-dark')

@section('content')
<link type="text/css" rel="stylesheet" href="{{ mix('css/main.css') }}">
<div class="d-flex flex-column justify-content-center w-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="row">
                    <h1>Восстановление пароля</h1>
                </div>
                @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @endif
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    <div class="form-group my-2">
                        <label for="email" class="form-label">Укажите email</label>
                        <input type="email" class="form-control" name="email" id="email"
                               placeholder="name@example.com" >
                    </div>
                    <div class="form-group my-2">
                        <input type="text" value="{{ $token }}" name="token" id="token" hidden>
                        <label for="password" class="form-label">Укажите пароль</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group my-2">
                        <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Изменить пароль</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
