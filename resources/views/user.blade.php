@extends('layouts.app-dark')


@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            С возвращением, {{ $user->getAttribute('name') }}
        </div>
    </div>

    <div class="my-3">
        <h3>Приобретённые курсы</h3>

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
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->paid_at }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
