<!DOCTYPE html>
<html>
<head>
    <title>Информация о заказе</title>
</head>
<body>
@if ($feedbackData)
    <p>Ваше сообщение: {{$feedbackData['message']}}</p>
@else
    <p>У вас пока нет сообщений.</p>
@endif
</body>
</html>
