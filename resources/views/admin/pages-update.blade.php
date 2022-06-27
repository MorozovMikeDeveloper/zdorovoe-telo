@extends('adminlte::page')

@section('title', 'Изменить курс')

@section('content_header')
<h1>{{ $page->name }}</h1>
@stop

@section('content')
<form action="{{ route('page_update', $page->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <x-adminlte-input name="name" label="Название" placeholder="Название страницы" value="{{ $page->name }}"
                          fgroup-class="col-md-6" disable-feedback/>
    </div>

    <div class="row">
        <x-adminlte-input name="slug" label="Url" placeholder="Ссылка" value="{{ $page->slug }}"
                            fgroup="col-md-6" disable-feedback/>
    </div>

    <div class="row">
        <x-adminlte-button class="btn-flat" type="submit" label="Сохранить" theme="success" icon="fas fa-lg fa-save"/>
    </div>
</form>
@stop
