@extends('layouts.app')


@section('content')
<div class="d-flex flex-column w-100 mt-5 align-items-center modal-body">
    <form action="/login" method="post" id="login-form">
        <div class="form-group my-2">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group my-2">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group my-2">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Войти</button>
    </form>
</div>
@endsection
