@extends('layouts.app-dark')


@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="row">
                <h1>Регистрация</h1>
            </div>
            @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            <form action="/signup" method="post" id="login-form">
                @csrf
                <div class="form-group my-2">
                    <label for="name" class="form-label">ФИО</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Пётр Иванович Абрамов">
                </div>
                <div class="form-group my-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="name@example.com">
                </div>
                <div class="form-group my-2">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    Есть аккаунт? <a href="{{ route('login_form') }}">Войти</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Регистрация</button>
            </form>
        </div>
    </div>
</div>
@endsection