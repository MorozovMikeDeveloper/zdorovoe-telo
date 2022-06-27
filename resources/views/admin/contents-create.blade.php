@extends('adminlte::page')

@section('title', 'Новый контент')

@section('content_header')
<h1>Создание нового контент</h1>
@stop

@section('content')
<form action="{{ route('content_create') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <x-adminlte-input name="key" label="Ключ" placeholder="Название ключа"
                          fgroup-class="col-md-6" disable-feedback/>
    </div>

    <div class="row">
        <x-adminlte-textarea name="value" label="Текст" placeholder="Введите текст..."
                             style="resize: none" disable-feedback>
        </x-adminlte-textarea>
    </div>

    <div class="row">
        <x-adminlte-input name="page_id" label="Страница" placeholder="Номер страницы"
                          fgroup-class="col-md-6" disable-feedback/>
    </div>

    <x-adminlte-button class="btn-flat" type="submit" label="Создать" theme="success" icon="fas fa-lg fa-save"/>
</form>
@stop
