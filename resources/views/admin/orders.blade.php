@extends('adminlte::page')

@section('title', 'Покупки')

@section('content_header')
    <h1>Оплаты</h1>
@stop

@section('content')
    <div class="container mt-5 justify-content-around">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Дата</th>
                    <th>Название курса</th>
                    <th>Статус оплаты</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>{{ $order->course()->name }}</td>
                    <td>{{ $order->status === 0 ? 'Не оплачен' : 'Оплачен'  }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

