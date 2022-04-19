@extends('layouts.app-dark')


@section('content')
<div class="container my-3">
    <h3 class="m-2">Каталог курсов</h3>

    <div class="d-flex justify-content-center flex-wrap">

        @foreach($courses as $course)
        <div class="card m-2" style="width: 15rem;">
            <img src="{{ $course->getFirstMediaUrl('preview_images', 'thumb') }}" class="card-img-top" alt="Preview of course">
            <div class="card-body">
                <h5 class="card-title">{{ $course->name }}</h5>
                <p class="card-text">{{ $course->description }}</p>
                <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-primary">Открыть детальную</a>
            </div>
        </div>
        @endforeach

@endsection
