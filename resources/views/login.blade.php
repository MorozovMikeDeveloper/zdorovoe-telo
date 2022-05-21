@extends('layouts.app-dark')


@section('content')
<link type="text/css" rel="stylesheet" href="{{ mix('css/main.css') }}">
<div class="d-flex flex-column justify-content-center w-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="row">
                    <h1>Вход в кабинет</h1>
                </div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <form action="/login" method="post" id="login-form">
                    @csrf
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
                        Забыли пароль? <a href="{{ route('password.request') }}">Сбросить</a>
                    </div>
                    <div>
                        Впервые здесь? <a href="{{ route('signup_form') }}">Зарегистрируйтесь</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Войти</button>
                    <a class="btn btn-outline-primary w-100" href="{{ route('auth.social', 'vkontakte') }}" title="Vkontakte">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>Войти через &nbsp;</div>
                            <div><i class="fa-brands fa-2x fa-vk"></i></div>
                        </div>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
