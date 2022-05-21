@component('mail::message')

@component('mail::button', ['url' => $url])
Сменить пароль
@endcomponent

<p>Если кнопа не работает, перейдите по ссылке <a href="{{ $url }}">{{ $url }}</a></p>

@endcomponent
