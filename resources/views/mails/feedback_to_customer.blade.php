<h1>Спасибо за ваше сообщение!</h1>

<p>При необходимости наш менеджер обязательно с вами свяжется.</p>
<p>Копия сообщения:</p>
<strong>Автор:</strong> {{ $data['name'] }}<br>
<strong>E-mail:</strong> {{ $data['email'] }}<br><br>
<strong>Сообщение:</strong> {!! nl2br($data['message']) !!}