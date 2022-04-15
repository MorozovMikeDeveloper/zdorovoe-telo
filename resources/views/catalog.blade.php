@extends('layouts.app-dark')


@section('content')
<div class="my-3">
    <h3>Каталог курсов</h3>

    <div class="d-flex mt-5 justify-content-between flex-row">
        @foreach($courses as $course)

        @php
        $slug = url()->current() . $course->slug;
        @endphp

        <div class="card w-25">
            <div class="card-body">
                <h5 class="card-title">{{ $course->name }}</h5>
                <p class="card-text">{{ $course->name }}</p>
                <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-primary">Открыть детальную</a>
            </div>
        </div>
        @endforeach
@endsection
