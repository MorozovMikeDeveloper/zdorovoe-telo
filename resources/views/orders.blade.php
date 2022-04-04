@extends('layouts.app-dark')

@section('content')
    <div class="my-3">
        <h1>Список заказов</h1>

        <div class="container mt-5 justify-content-around">
            <table class="table-responsive">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Дата</th>
                    <th>Курс</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->paid_at }}</td>
                    <td>{{ $order->course()->name }}</td>
                    <td>{{ $order->status }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
