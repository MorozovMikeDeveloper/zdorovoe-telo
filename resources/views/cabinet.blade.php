@extends('layouts.app')

@section('content')
    <h1>Каталог курсов</h1>

    <div class="container">
    @foreach($courses as $course)
        <a href="">

        </a>
        <div class="d-inline-flex p-2 bd-highlight">
            {{$course->name}}
        </div>
    @endforeach()
    </div>
@endsection
