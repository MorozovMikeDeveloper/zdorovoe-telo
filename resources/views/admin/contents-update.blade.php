@extends('adminlte::page')

@section('title', 'Изменить контент')

@section('content_header')
<h1>{{ $content->key }}</h1>
@stop

@section('content')
<form action="{{ route('content_update', $content->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <x-adminlte-input name="key" label="Ключ" placeholder="Название ключа" value="{{ $content->key }}"
                          fgroup-class="col-md-6" disable-feedback/>
    </div>

    <div class="row">
        <x-adminlte-input name="value" label="Текст" placeholder="Текст" value="{{ $content->value }}"
                          fgroup="col-md-6" disable-feedback/>
    </div>

    <div class="row">
        <x-adminlte-input name="page_id" label="Номер привязанной страницы" placeholder="Номер" value="{{ $content->page->id }}"
                          fgroup="col-md-6" disable-feedback/>
    </div>

    <div class="row">
        <x-adminlte-button class="btn-flat" type="submit" label="Сохранить" theme="success" icon="fas fa-lg fa-save"/>
    </div>
</form>
@stop
