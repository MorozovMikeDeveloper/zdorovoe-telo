@extends('adminlte::page')

@section('title', 'Courses')

@section('content_header')
    <h1>Courses</h1>
@stop

@section('content')
    <a href="courses/create-course">
        <x-adminlte-button label="New course" theme="primary"/>
    </a>

    <div class="container mt-5 justify-content-around">
        <table class="table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course</th>
                    <th>Category</th>
                    <th>Description</th>
                </tr>
            </thead>

            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->category }}</td>
                    <td>{{ $course->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
