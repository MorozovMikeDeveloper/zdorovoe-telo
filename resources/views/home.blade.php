@extends('layouts.app')

@section('content')
<div class="page page--active" id="home-page">
    <section class="section title" id="title">
        <div class="video-bg">
            <div class="video-bg__overlay"></div>
            <video preload="auto" loop="" autoplay="" width="100%" height="100%" src="{{ asset('video/file.mp4') }}"
                style="width:100%;height:100%;object-fit:cover;object-position:center center;opacity:1"></video>
        </div>
        <div class="title__text">
            <div>Илья
                <br>Денисов
            </div>
            <div class="mt-4">Физиотерапия
                <br>в движении
            </div>
        </div>
    </section>
    <section class="section section--gray" id="about">
        <div class="container position-relative">
            <div class="row py-3 py-lg-0 mx-0">
                <div class="col-lg-6 d-flex flex-row justify-content-lg-end justify-content-center"><img
                        class="img-fluid" src="{{ asset('img/man2.webp') }}" alt=""></div>
                <div class="col-lg-6 d-flex flex-row w-auto justify-content-center">
                    <div class="about-block bg-white d-flex flex-column justify-content-around" style="padding:40px">
                        <div class="block-title">Обо мне</div>
                        <div class="py-5">
                            <p>{{ $content }}</p>
                        </div><a class="btn-primary" href="#" id="about-btn">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section--dark" id="courses">
        <div class="container">
            <div class="row">

                <div class="col-12 d-flex flex-column align-items-center">
                    <div class="block-title block-title--light my-5">Курсы</div>
                    @forelse($courses as $course)
                            <div class="course-card bg-white d-flex flex-column py-4 px-2 my-2">
                                <div class="course-card__title text-green text-uppercase">{{ $course->name }}</div>
                                <div class="course-card__description">{{ $course->description }}</div>
                                <hr>
                                <div class="course-card__price">{{ $course->cost }} руб.</div>
                                <a class="btn-primary" href="{{ route('courses.show', $course->slug) }}">Приобрести</a>
                            </div>

                    @empty
                        <h3 class="text-center">Курсы ещё не созданы</h3>
                    @endforelse
                    <a class="btn-primary" href="#" id="course-btn">Смотреть все</a>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="page" id="about-page">
    <section class="section section--gray h-100" id="about-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="block-title my-5">Обо мне</div>
                </div>
                <div class="col-lg-8 offset-lg-2"><img class="img-fluid" src="{{ asset('img/man.webp') }}" alt=""></div>
                <div class="col-lg-8 offset-lg-2">
                    <div class="row my-lg-4">
                        <div class="col-lg-4">
                            <div class="fi-block">Илья
                                <br>Денисов
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="bg-white p-4">
                                <p>{{ $content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="page" id="course-page">
    <section class="section section--gray h-100" id="about-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="block-title my-5">Каталог курсов</div>
                </div>
                <div class="col-lg-8 offset-lg-2 my-3"><img class="img-fluid" src="{{ asset('img/leg.webp') }}" alt=""></div>
                @forelse($courses as $course)
                <div class="col-12">
                    <div class="course-card bg-white d-flex flex-column py-4 px-2 my-2">
                        <div class="course-card__title text-green text-uppercase">{{ $course->name }}</div>
                        <div class="course-card__description">{{ $course->description }}</div>
                        <hr>
                        <div class="course-card__price">{{ $course->cost }} руб.</div>
                        <a class="btn-primary" href="{{ route('courses.show', $course->slug) }}">Приобрести</a>
                    </div>
                </div>
                @empty
                    <h3 class="text-center">Курсы ещё не созданы</h3>
                @endforelse
            </div>
        </div>
    </section>
</div>
@endsection
