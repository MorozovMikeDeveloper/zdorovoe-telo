@extends('adminlte::page')

@section('title', 'Изменить курс')

@section('content_header')
<h1>Курс {{ $course->id }}</h1>
@stop

@section('content')
<form action="{{ route('course-update', $course->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <x-adminlte-input name="name" label="Название" placeholder="Название курса" value="{{ $course->name }}"
                          fgroup-class="col-md-6" disable-feedback/>
    </div>

    <div class="row">
        <x-adminlte-input name="category" label="Категория" placeholder="Категория курса" value="{{ $course->category }}"
                          fgroup-class="col-md-6" disable-feedback/>
    </div>

    <div class="row">
        <x-adminlte-input-file name="preview_image" label="Превью курса (изображение)" placeholder="Загрузить изображение..."
                               value="{{ $course->getFirstMediaUrl('preview_images', 'thumb') }}" fgroup-class="col-md-6" disable-feedback/>
    </div>

<!--    <div class="row">-->
<!--        <img src="{{ $course->getFirstMediaUrl('preview_images', 'thumb') }}" / width="120px">-->
<!--    </div>-->

    <div class="row">
        <x-adminlte-input-file name="course_video" label="Видеоурок курса (видео)" placeholder="Загрузите видео..."
                               value="{{ $course->getFirstMediaUrl('courses_videos') }}" fgroup-class="col-md-6" disable-feedback/>
    </div>

<!--    <div class="row">-->
<!--        <video width="420" height="340" controls>-->
<!--            <source src="{{ $course->getFirstMediaUrl('courses_videos') }}">-->
<!--        </video>-->
<!--    </div>-->

    <div class="row">
        <x-adminlte-textarea name="description" label="Описание" placeholder="Введите описание..."
                             fgroup-class="col-md-6" disable-feedback>
            {{ $course->description }}
        </x-adminlte-textarea>
    </div>

    <div class="row">
        <x-adminlte-input name="cost" label="Стоимость курса" placeholder="Стоимость курса" value="{{ $course->cost }}"
                          fgroup-class="col-md-6" disable-feedback/>
    </div>

    <div class="row">
        <x-adminlte-button class="btn-flat" type="submit" label="Сохранить" theme="success" icon="fas fa-lg fa-save"/>
    </div>
</form>
@stop
