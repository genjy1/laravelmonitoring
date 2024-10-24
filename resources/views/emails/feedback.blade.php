<!DOCTYPE html>
<html>
<head>
    <title>Информация о заказе</title>
</head>
<body>
<h1>Привет, {{ $name }}!</h1>

@if ($message)
    <p>Ваше сообщение: {{ $message }}</p>
@else
    <p>У вас пока нет сообщений.</p>
@endif

<p>Спасибо за то, что с нами!</p>
</body>
</html>
