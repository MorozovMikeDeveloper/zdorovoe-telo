@extends('layouts.app-dark')

@section('content')
    <div class="container mt-5">
        <h1>Каталог курсов</h1>

        <div class="container mt-5 w-100 h-100 justify-content-around">
            @foreach($courses as $course)
            <div class="card w-25">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">{{ $course->name }}</p>
                    <a href="cabinet . {{ $course->slug }}" class="btn btn-primary">Открыть детальную</a>
                </div>
            </div>
            @endforeach()
        </div>
    </div>
@endsection
