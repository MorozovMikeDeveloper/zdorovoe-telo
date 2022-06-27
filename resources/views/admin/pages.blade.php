@extends('adminlte::page')

@section('title', 'Страницы')

@section('content_header')
<h1>Страницы</h1>
@stop

@section('content')
    <div class="d-flex bd-highlight mb-4">
        <a href="pages/create-page">
            <x-adminlte-button label="Создать страницу" theme="primary"/>
        </a>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Урл</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        <a href="pages/{{ $page->id }}">
                            <x-adminlte-button style="width: 130px; margin: 0 0 5px 0;" label="Редактировать" theme="primary"/>
                        </a>
                        <form action="{{ route('page-delete', $page->id) }}" method="post">
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
