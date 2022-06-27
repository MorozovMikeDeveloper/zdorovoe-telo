@extends('adminlte::page')

@section('title', 'Новая страница')

@section('content_header')
<h1>Создание новой страницы</h1>
@stop

@section('content')
<form action="{{ route('page_create') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <x-adminlte-input name="name" label="Название страницы" placeholder="Название страницы"
                          fgroup-class="col-md-6" disable-feedback/>
    </div>

    <x-adminlte-button class="btn-flat" type="submit" label="Создать" theme="success" icon="fas fa-lg fa-save"/>
</form>
@stop
