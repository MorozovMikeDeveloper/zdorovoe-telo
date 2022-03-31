@extends('layouts.app-dark')


@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            С возвращением, {{ $user->getAttribute('name') }}
        </div>
    </div>

    <div class="my-3">
        <h3>Приобретённые курсы</h3>

        <div class="container mt-5 justify-content-around">
            <!-- @foreach($courses as $course)
            <div class="card w-25">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">{{ $course->name }}</p>
                    <a href="cabinet . {{ $course->slug }}" class="btn btn-primary">Открыть детальную</a>
                </div>
            </div>
            @endforeach -->
        </div>
    </div>
    <div class="my-3">
        <h3>Каталог курсов</h3>

        <div class="d-flex mt-5 justify-content-between flex-row">
            @foreach($courses as $course)
            <div class="card w-25">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">{{ $course->name }}</p>
                    <a href="cabinet . {{ $course->slug }}" class="btn btn-primary">Открыть детальную</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
