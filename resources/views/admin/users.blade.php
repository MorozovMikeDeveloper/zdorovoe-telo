@extends('adminlte::page')

@section('title', 'Пользователи')

@section('content_header')
    <h1>Пользователи</h1>
@stop

@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Роль</th>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
