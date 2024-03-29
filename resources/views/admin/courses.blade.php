@extends('adminlte::page')

@section('title', 'Курсы')

@section('content_header')
    <h1>Курсы</h1>
@stop

@section('content')
    <div class="d-flex bd-highlight mb-4">
        <a href="courses/create-course">
            <x-adminlte-button label="Создать курс" theme="primary"/>
        </a>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Описание</th>
                    <th>Стоимость</th>
                    <th width="30%">Превью</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->category }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->cost }} руб.</td>
                    <td><img src="{{ $course->getFirstMediaUrl('preview_images', 'thumb') }}" / width="120px"></td>
                    <td>

                        <a href="{{ route('course-detail', $course->id)}}">
                            <x-adminlte-button style="width: 170px; margin: 10px" label="Редактировать курс" theme="primary"/>
                        </a>

                        <form action="{{ route('course-delete', $course->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <x-adminlte-button style="width: 170px; margin: 10px" type="submit" label="Удалить курс" theme="danger"/>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
