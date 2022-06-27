@extends('adminlte::page')

@section('title', 'Контент')

@section('content_header')
<h1>Контент</h1>
@stop

@section('content')
<div class="d-flex bd-highlight mb-4">
    <a href="contents/create-content">
        <x-adminlte-button label="Создать контент" theme="primary"/>
    </a>
</div>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Ключ</th>
            <th>Текст</th>
            <th>Привязанная страница</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($contents as $content)
        <tr>
            <td>{{ $content->id }}</td>
            <td>{{ $content->key }}</td>
            <td>{{ $content->value }}</td>
            <td>{{ $content->page->name }}</td>
            <td>
                <a href="contents/{{ $content->id }}">
                    <x-adminlte-button style="width: 130px; margin: 0 0 5px 0;" label="Редактировать" theme="primary"/>
                </a>
                <form action="{{ route('content-delete', $content->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <x-adminlte-button style="width: 130px;" type="submit" label="Удалить" theme="danger"/>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
