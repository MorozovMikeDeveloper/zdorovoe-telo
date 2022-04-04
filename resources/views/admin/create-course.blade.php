@extends('adminlte::page')

@section('title', 'New Course')

@section('content_header')
    <h1>Create new course</h1>
@stop

@section('content')
    <form action="create-course" method="post">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="Name" placeholder="Course name"
                              fgroup-class="col-md-6" disable-feedback/>
        </div>

        <div class="row">
            <x-adminlte-input name="slug" label="Slug" placeholder="Course slug"
                              fgroup-class="col-md-6" disable-feedback/>
        </div>

        <div class="row">
            <x-adminlte-input name="category" label="Category" placeholder="Course category"
                              fgroup-class="col-md-6" disable-feedback/>
        </div>

        <div class="row">
            <x-adminlte-input-file name="picture" label="Upload file" placeholder="Choose a picture..."
                                   fgroup-class="col-md-6" disable-feedback/>
        </div>

        <div class="row">
            <x-adminlte-textarea name="description" placeholder="Insert description..."
                                 fgroup-class="col-md-6" disable-feedback/>
        </div>

        <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
    </form>
@stop
