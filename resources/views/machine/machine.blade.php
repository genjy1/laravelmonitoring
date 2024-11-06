@include('components.head')
@include('components.header')
<body>
    <div class="container my-0 mx-auto w-4/5 mt-20 ">
        <div class="success-message">
            @include('components.success')
        </div>
        <header class="machine-header py-2 border-b">
            <h1 class="text-3xl font-semibold">Автомат #{{$machine->id}}</h1>
        </header>
        @if($machine->status == 'Offline')
            <div class="error-message bg-red-500">
                <p class="p-1.5">
                    Нет связи с автоматом. Удаленное управление недоступно.
                </p>
            </div>
        @endif
        <div class="py-4">
            <p>
                Основные сведения об автомате.
                <br>
                Вы можете изменить некоторые поля и нажать "Сохранить", чтобы запомнить изменения. Некоторые функции могут быть доступны только в режиме "Online".
            </p>
        </div>
        <form action="{{route('machine.update',$machine->id)}}" method="POST" class="machine-edit__form">
            @method('patch')
            @csrf
            <div class="machine-properties">
                <table>
                    <tr class="border-b border-t">
                        <td class="p-2 border-r">ID автомата</td>
                        <td class="p-2">{{$machine->id}}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">ID контроллера</td>
                        <td class="p-2" >
                            {{
                                $machine->controller_id ? $machine->controller_id : 'Неизвестно'
                            }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">Версия ПО</td>
                        <td class="p-2">
                            {{
                                $machine->software_version ? $machine->software_version : 'Неизвестно'
                            }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">Подписка действует до</td>
                        <td class="p-2">
                            {{
                                $machine->subscription_until ? $machine->subscription_until : 'Неизвестно'
                            }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">Статус</td>
                        <td class="p-2 {{$machine->status == 'Offline' ? "text-red-800" : "text-green-500"}}">{{$machine->status == 'Offline' ? $machine->status . ' ' . "(последняя активность $machine->updated_at)" : $machine->status  }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">Текущие ошибки</td>
                        <td class="p-2">
                            {{
                                $machine->errors ?? 'Неизвестно'
                            }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">Состояние</td>
                        <td class="p-2">
                            {{
                                $machine->condition ?? 'Неизвестно'
                            }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">Дата и время запуска</td>
                        <td class="p-2">{{$machine->created_at ?? 'Неизвестно'}}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">
                            <label for="balance">
                                Текущий баланс
                            </label>
                        </td>
                        <td class="flex sm:flex-row sm:items-center flex-col">
                            <input type="number" id="balance" name="balance" min="0" class="p-2 disabled:bg-white balance-input no-arrows" disabled value="{{$machine->balance ?? 0}}">
                            @if($machine->status === 'Online')
                                <button type="button" class="balance-btn flex float-right border py-2 px-2 items-center rounded gap-2">
                                    @include('components.icons.dollar')
                                    Установить баланс
                                </button>
                            @endif
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">Номер автомата</td>
                        <td class="flex items-center"><input type="text" class="p-2 w-36 sm:w-full focusable" name="number" id="number" value="{{$machine->number ? $machine->number : 'Неизвестно'}}">@include('components.icons.edit',['id'=>'number'])</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">Имя автомата</td>
                        <td class="flex items-center"><input type="text" class="p-2 w-36 sm:w-full focusable" name="name" id="name" value="{{$machine->name ? $machine->name : 'Неизвестно'}}">@include('components.icons.edit',['id'=>'name'])</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">Адрес</td>
                        <td class="flex items-center"><input type="text" class="p-2 w-36 sm:w-full focusable" name="address" id="address" value="{{$machine->address ? $machine->address : 'Неизвестно'}}">@include('components.icons.edit',['id'=>'address'])</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border-r">Дополнительная информация</td>
                        <td class="flex items-center"><input disabled type="text" class="p-2 w-full" ></td>
                    </tr>
                </table>
            </div>
            <div class="btn-group sm:flex-row flex-col flex gap-2 mt-2">
                <button type="submit" class="p-2 bg-[#337ab7] w-full font-semibold  text-center text-white rounded sm:max-w-[220px] flex items-center justify-between">
                    Сохранить изменения
                    <svg class="w-8 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </button>
                @if($machine->status === 'Online')
                    <button type="submit" name="command" value="restart" class="bg-[#d9534f] p-2 w-full font-semibold text-center text-white rounded sm:max-w-[220px] flex items-center justify-between" onclick="e w-36.sm:preventDefault()">
                        Перезагрузить автомат
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <polygon points="13,2 3,14 11,14 8,22 18,10 10,10" fill="white"/>
                        </svg>
                    </button>
                @endif
            </div>
        </form>
    </div>
</body>
