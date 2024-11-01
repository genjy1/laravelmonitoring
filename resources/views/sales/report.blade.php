<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Продажи ваших автоматов</title>
    @vite('/resources/css/app.css')
</head>
<body>
<table class="table-auto w-full">
    <thead>
    <tr class="bg-[#eee] border-x">
        <th class="border-r font-normal py-2">
                № автомата
        </th>
        <th class="border-r font-normal py-2">
                Дата и время
        </th>
        <th class="border-r font-normal py-2">
                Принято денег
        </th>
        <th class="border-r font-normal py-2">
                Выдано сдачи
        </th>
        <th class="border-r font-normal py-2">
            Товары
        </th>
        <th class="font-normal py-2">
                Выручка
        </th>
        <!-- Другие заголовки столбцов -->
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $sale)
        <tr class="border-b border-x">
            <td class="text-center py-2 border-r">{{ $sale->machine_id }}</td>
            <td class="text-center py-2 border-r">{{ $sale->dateTime }}</td>
            <td class="text-center py-2 border-r">{{ $sale->balance }}</td>
            <td class="text-center py-2 border-r">{{ $sale->change_given }}</td>
            <td class="text-center py-2">{{ $sale->revenue }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
