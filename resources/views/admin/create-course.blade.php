@extends('adminlte::page')

@section('title', 'Новый курс')

@section('content_header')
    <h1>Создание нового курса</h1>
@stop

@section('content')
    <form action="create-course" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="Название" placeholder="Название курса"
                              fgroup-class="col-md-6" disable-feedback/>
        </div>

        <div class="row">
            <x-adminlte-input name="slug" label="Урл" placeholder="Урл курса"
                              fgroup-class="col-md-6" disable-feedback/>
        </div>

        <div class="row">
            <x-adminlte-input name="category" label="Категория" placeholder="Категория курса"
                              fgroup-class="col-md-6" disable-feedback/>
        </div>

        <div class="row">
            <x-adminlte-input-file name="preview_image" label="Превью курса (изображение)" placeholder="Загрузить изображение..."
                                   fgroup-class="col-md-6"/>
        </div>

        <div class="row">
            <x-adminlte-input-file name="course_video" label="Видеоурок курса (видео)" placeholder="Загрузите видео..."
                                    fgroup-class="col-md-6"/>
        </div>

        <div class="row">
            <x-adminlte-textarea name="description" label="Описание" placeholder="Введите описание..."
                                 fgroup-class="col-md-6" disable-feedback/>
        </div>

        <x-adminlte-button class="btn-flat" type="submit" label="Создать" theme="success" icon="fas fa-lg fa-save"/>
    </form>
@stop
