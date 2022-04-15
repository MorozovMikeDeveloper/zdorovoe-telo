@extends('layouts.app-dark')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="img-fluid" src="{{ $course->preview ?? 'https://placeimg.com/640/480/any' }}">
            </div>
            <div class="col-md-8">
                <div class="block-title my-2">{{ $course->name }}</div>
                <div class="my-md-4">
                    <p>{{ $course->description  }}</p>
                </div>
                @guest
                    <div class="my-md-4">
                        <div class="course-card__price">{{ $course->cost }} руб.</div>
                    </div>
                    <div class="my-md-4">
                        <a class="btn-primary" href="{{ route('login_form') }}">Приобрести</a>
                    </div>
                @endguest
                @auth
                    @if(!$content)
                    <div class="my-md-4">
                        <div class="course-card__price">{{ $course->cost }} руб.</div>
                    </div>
                    <div class="my-md-4">
                        <a class="btn-primary" href="">Приобрести</a>
                    </div>
                    @endif
                @endauth
            </div>
        </div>
        @if($content)
            <div class="alert alert-success">Вы оплатили курс. Здесь будет контент</div>
        @endif
    </div>
@endsection
