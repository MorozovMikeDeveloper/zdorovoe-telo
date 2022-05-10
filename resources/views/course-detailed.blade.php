@extends('layouts.app-dark')


@section('content')
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-4">
                <img class="img-fluid" src="{{ $course->getFirstMediaUrl('preview_images') }}" alt="Course preview">
            </div>
            <div class="col-md-8">
                <div class="block-title my-2">{{ $course->name }}</div>
                <div class="my-md-4">
                    <p>{{ $course->description }}</p>
                </div>
                @guest
                    <div class="my-md-4">
                        <div class="course-card__price">{{ $course->cost }} руб.</div>
                    </div>
                    <div class="my-md-4">
                        <button class="btn-primary" href="{{ route('login_form') }}">Приобрести</button>
                    </div>
                @endguest

                @auth
                    @if(!$content)
                    <div class="my-md-4">
                        <div class="course-card__price">{{ $course->cost }} руб.</div>
                    </div>
                    <div class="my-md-4">
                        <form method="post" action="{{ route('payment_create') }}">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button type="submit" class="btn-primary">Приобрести</button>
                        </form>
                    </div>

                    @elseif($content)
                        <video id="my-player" class="video-js vjs-theme-forest"
                                controls
                                style="width: 100%;
                                height: 100%;
                                min-height: 100px;"
                               poster="{{ $course->getFirstMediaUrl('preview_images') }}"
                            >
                            <source src="{{ $course->getFirstMediaUrl('courses_videos') }}" type="video/mp4">
                        </video>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
