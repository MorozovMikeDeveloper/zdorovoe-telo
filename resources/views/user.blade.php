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
            <div class="row gy-2">
                    @forelse($courses as $course)
                        <div class="col-md-4">
                            <div class="card" style="width:100%">

                                <img src="{{ $course->course_model->getFirstMediaUrl('preview_images') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->name }}</h5>
                                    <p class="card-text">{{ $course->description }}</p>
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-primary w-100">Материалы курса</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-default text-center">
                            Оплаченные курсы не найдены
                        </div>
                    @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
