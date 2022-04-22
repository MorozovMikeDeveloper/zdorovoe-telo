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
                    <th width="30%">Превью</th>
                </tr>
            </thead>

            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->category }}</td>
                    <td>{{ $course->description }}</td>
                    <td><img src="{{ $course->getFirstMediaUrl('preview_images', 'thumb') }}" / width="120px"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
