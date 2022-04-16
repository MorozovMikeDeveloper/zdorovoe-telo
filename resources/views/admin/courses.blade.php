@extends('adminlte::page')

@section('title', 'Courses')

@section('content_header')
    <h1>Courses</h1>
@stop

@section('content')
    <div class="d-flex bd-highlight mb-4">
        <a href="courses/create-course">
            <x-adminlte-button label="New course" theme="primary"/>
        </a>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th width="30%">Preview</th>
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
