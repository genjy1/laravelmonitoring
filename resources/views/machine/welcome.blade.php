<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('components.head')
    <body class="font-sans">
        @include('components.header')
        <div class="container w-4/5 mx-auto my-0 mt-20">
            <h2 class="text-3xl pb-2 border-b mb-3.5 mt-3 font-semibold flex items-center justify-between">
                Сервис
                <a href="{{route('machine.attach')}}" class="text-white flex gap-2 border-r-2 bg-[#337ab7] rounded-[4px] font-semibold border-[#2e6da4] text-lg px-4 py-2 float-right">
                    Привязать автомат
                    <span class="icon">
                        <svg width="32" height="32" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <!-- Круг -->
                            <circle cx="50" cy="50" r="45" stroke="white" stroke-width="5" fill="none" />
                            <!-- Горизонтальная линия плюса -->
                            <line x1="50" y1="30" x2="50" y2="70" stroke="white" stroke-width="6" />
                            <!-- Вертикальная линия плюса -->
                            <line x1="30" y1="50" x2="70" y2="50" stroke="white" stroke-width="6" />
                        </svg>
                    </span>
                </a>
            </h2>
            <div class="overflow-hidden">
                <h3 class="mb-2.5">Пожалуйста, выберите автомат из списка:</h3>

                <!-- Таблица для десктопов -->
                <table class="table-auto border-collapse border-[#ddd] border w-full hidden sm:table">
                    <thead>
                    <tr class="border bg-[#eee] h-14 text-nowrap">
                        <th class="border-r p-2 font-normal text-[#333] text-center w-24">#</th>
                        <th class="border-r p-2 font-normal text-[#333] text-center w-36">Статус</th>
                        <th class="border-r p-2 font-normal text-[#333] text-center">Номер автомата</th>
                        <th class="border-r p-2 font-normal text-[#333] text-center">IMEI / ID контроллера</th>
                        <th class="border-r p-2 font-normal text-[#333] text-center">Имя автомата</th>
                        <th class="border-r p-2 font-normal text-[#333] text-center">Адрес</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($machines as $machine)
                        <tr class="text-center row cursor-pointer hover:bg-gray-100 border-b" onclick="document.location = '/machine/{{ $machine->id }}' ">
                            <td class="border-r p-2">{{ $machine->id }}</td>
                            <td class="{{$machine->status == 'Online' ? 'text-green-800' : 'text-red-800' }} border-r">
                                {{$machine->status}}
                            </td>
                            <td class="border-r">{{$machine->number}}</td>
                            <td class="border-r">{{$machine->imei}}</td>
                            <td class="border-r">{{$machine->name}}</td>
                            <td class="border-r">{{$machine->address}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Карточки для мобильных устройств -->
                <div class="grid gap-4 sm:hidden h-[600px] overflow-y-auto">
                    @foreach($machines as $machine)
                        <a href="{{route('machine.show',$machine->id)}}">
                                    <div class="border border-gray-300 rounded-lg p-4 shadow-md" >
                                        <div class="flex flex-col mb-2">
                                            <span class="text-xs text-gray-500">#</span>
                                            <span class="font-bold">{{ $machine->id }}</span>
                                        </div>
                                        <div class="flex flex-col mb-2">
                                            <span class="text-xs text-gray-500">Статус</span>
                                            <span class="{{$machine->status == 'Online' ? 'text-green-800' : 'text-red-800' }}">
                                                {{$machine->status}}
                                            </span>
                                        </div>
                                        <div class="flex flex-col mb-2">
                                            <span class="text-xs text-gray-500">Номер автомата</span>
                                            <span>{{$machine->number}}</span>
                                        </div>
                                        <div class="flex flex-col mb-2">
                                            <span class="text-xs text-gray-500">IMEI / ID контроллера</span>
                                            <span>{{$machine->imei}}</span>
                                        </div>
                                        <div class="flex flex-col mb-2">
                                            <span class="text-xs text-gray-500">Имя автомата</span>
                                            <span>{{$machine->name}}</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-xs text-gray-500">Адрес</span>
                                            <span>{{$machine->address}}</span>
                                        </div>
                                    </div>
                                  @endforeach
                                </div>
                            </div>
                        </a>
            <div class="pagination-container my-4 mx-auto sm:w-3/4 float-left">
                {{ $machines->links() }}
            </div>
        </div>
    </body>
</html>
