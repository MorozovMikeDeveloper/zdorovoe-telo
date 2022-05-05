@extends('layouts.payment')



@section('content')
<div class="payment-page">
    <div class="payment-wrap">
        <div class="payment-block">
            <div class="product-block">
                <div>Вы собираетесь приобрести курс
                    <span>"{{ $order->course->name }}"</span>
                </div>
            </div>
            <div class="amount-block">
                <div>
                    <div class="amount-label">К оплате:</div>
                    <div class="amount-amount">{{ number_format($order['amount'], 2) }} <span>руб.</span></div>
                </div>
                <form class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg">Перейти к оплате</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
