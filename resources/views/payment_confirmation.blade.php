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
                <form class="d-grid gap-2" action="https://pay.freekassa.ru/">
                    <input type="hidden" name="m" value="{{ env('FK_ID') }}">
                    <input type="hidden" name="oa" value="{{ $order['amount'] }}">
                    <input type="hidden" name="currency" value="RUB">
                    <input type="hidden" name="o" value="{{ $order->id }}">
                    <input type="hidden" name="s" value="{{ md5(env('FK_ID') . ':' . $order['amount'] . ':' .  env('FK_SECRET') . ':' . 'RUB' . ':' . $order->id) }}">
                    <button type="submit" class="btn btn-success btn-lg">Перейти к оплате</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
