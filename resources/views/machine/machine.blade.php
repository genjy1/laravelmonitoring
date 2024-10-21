@include('components.head')
@include('components.header')
<body>
    <div class="container my-0 mx-auto w-4/5">
        <header class="machine-header">
            <h1>Автомат #{{$machine->id}}</h1>
        </header>
        @if($machine->status == 'Offline')
            <div class="error-message bg-red-500">
                <p class="p-1.5">
                    Нет связи с автоматом. Удаленное управление недоступно.
                </p>
            </div>
        @endif
        <div>
            <p>
                Основные сведения об автомате.
                <br>
                Вы можете изменить некоторые поля и нажать "Сохранить", чтобы запомнить изменения. Некоторые функции могут быть доступны только в режиме "Online".
            </p>
        </div>
        <div class="machine-properties">
            <table>
                <tr scope="row" class="border-b border-t">
                    <td class="p-2">ID автомата</td>
                    <td class="p-2">{{$machine->id}}</td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">ID контроллера</td>
                    <td class="p-2">
                        {{
                            $machine->controller_id ? $machine->controller_id : 'Неизвестно'
                        }}
                    </td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">Версия ПО</td>
                    <td class="p-2">
                        {{
                            $machine->software_version ? $machine->software_version : 'Неизвестно'
                        }}
                    </td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">Подписка действует до</td>
                    <td class="p-2">
                        {{
                            $machine->subscription_until ? $machine->subscription_until : 'Неизвестно'
                        }}
                    </td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">Статус</td>
                    <td class="p-2">{{$machine->status}}</td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">Текущие ошибки</td>
                    <td class="p-2">
                        {{
                            $machine->errors ? $machine->errors : 'Неизвестно'
                        }}
                    </td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">Состояние</td>
                    <td class="p-2">
                        {{
                            $machine->condition ? $machine->condition : 'Неизвестно'
                        }}
                    </td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">Дата и время запуска</td>
                    <td class="p-2">{{$machine->created_at}}</td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">Текущий баланс</td>
                    <td class="p-2">
                        {{
                            $machine->balance ? $machine->balance : 'Неизвестно'
                        }}
                    </td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">Номер автомата</td>
                    <td class="p-2">
                        {{
                            $machine->number ? $machine->number : 'Неизвестно'
                        }}
                    </td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">Имя автомата</td>
                    <td class="p-2">{{$machine->name}}</td>
                </tr>
                <tr scope="row" class="border-b">
                    <td class="p-2">Адрес</td>
                    <td class="p-2">{{$machine->address}}</td>
                </tr>
                <tr class="border-b">
                    <td class="p-2">Дополнительная информация</td>
                    <td class="p-2"></td>
                </tr>
            </table>
        </div>
    </div>
</body>
