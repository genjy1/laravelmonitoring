@include('components.head')
<body>
    @include('components.header')
    <main class="mx-auto mt-20 w-4/5">
        <h1 class="text-3xl pb-2 mt-3 font-medium flex items-center justify-between text-nowrap">Состояние автоматов</h1>
        <hr>
        <table class="hidden sm:table table-auto w-full border mt-4">
            <thead>
            <tr class="border-b bg-[#eee]">
                <th class="border-r py-2 font-normal"><a href="{{route('machine.showState',['id'=>\Illuminate\Support\Facades\Auth::user()->id,'sort'=>'id','direction'=>$sortDirection === 'asc' ? 'desc' : 'asc'])}}">#</a></th>
                <th class="border-r py-2 font-normal"><a href="{{route('machine.showState',['id'=>\Illuminate\Support\Facades\Auth::user()->id,'sort'=>'number','direction'=>$sortDirection === 'asc' ? 'desc' : 'asc'])}}">Номер</a></th>
                <th class="border-r py-2 font-normal"><a href="{{route('machine.showState',['id'=>\Illuminate\Support\Facades\Auth::user()->id,'sort'=>'status','direction'=>$sortDirection === 'asc' ? 'desc' : 'asc'])}}">Статус</a></th>
                <th class="border-r py-2 font-normal"><a href="{{route('machine.showState',['id'=>\Illuminate\Support\Facades\Auth::user()->id,'sort'=>'condition','direction'=>$sortDirection === 'asc' ? 'desc' : 'asc'])}}">Состояние</a></th>
                <th class="border-r py-2 font-normal"><a href="{{route('machine.showState',['id'=>\Illuminate\Support\Facades\Auth::user()->id,'sort'=>'cash_counter','direction'=>$sortDirection === 'asc' ? 'desc' : 'asc'])}}">Счётчик денег</a></th>
                <th class="border-r py-2 font-normal"><a href="{{route('machine.showState',['id'=>\Illuminate\Support\Facades\Auth::user()->id,'sort'=>'','direction'=>$sortDirection === 'asc' ? 'desc' : 'asc'])}}">Сдача</a></th>
                <th class="border-r py-2 font-normal"><a href="{{route('machine.showState',['id'=>\Illuminate\Support\Facades\Auth::user()->id,'sort'=>'balance','direction'=>$sortDirection === 'asc' ? 'desc' : 'asc'])}}">Баланс</a></th>
                <th class="border-r py-2 font-normal"><a href="{{route('machine.showState',['id'=>\Illuminate\Support\Facades\Auth::user()->id,'sort'=>'goods_sold','direction'=>$sortDirection === 'asc' ? 'desc' : 'asc'])}}">Продано товаров</a></th>
                <th class="font-normal"><a href="{{route('machine.showState',['id'=>\Illuminate\Support\Facades\Auth::user()->id,'sort'=>'','direction'=>$sortDirection === 'asc' ? 'desc' : 'asc'])}}">Выручка</a></th>
            </tr>
            </thead>
            <tbody>
                @foreach($machines as $machine)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2 border-r">{{  $machine->id  }}</td>
                        <td class="p-2 border-r">{{ $machine->number  }}</td>
                        <td class="p-2 border-r {{$machine->status == 'Online' ? 'text-green-800' : 'text-red-800'}}">{{  $machine->status  }}</td>
                        <td class="p-2 border-r">{{  $machine->condition  }}</td>
                        <td class="p-2 border-r">{{  $machine->cash_counter  }}</td>
                        <td class="p-2 border-r">Cash</td>
                        <td class="p-2 border-r">{{  $machine->balance  }}</td>
                        <td class="p-2 border-r">{{  $machine->goods_sold  }}</td>
                        <td class="p-2">{{  $machine->goods_total  }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="grid gap-4 sm:hidden mt-5">
            @foreach($machines as $machine)
                <div class="border rounded-lg shadow-md p-4 bg-white hover:bg-gray-100">
                    <div class="flex items-center justify-between border-b pb-2 mb-2">
                        <h3 class="font-semibold text-lg">Автомат #{{ $machine->id }}</h3>
                        <span class="text-sm {{ $machine->status == 'Online' ? 'text-green-800' : 'text-red-800' }}">
                    {{ $machine->status }}
                </span>
                    </div>
                    <div class="space-y-2">
                        <p><strong>Номер:</strong> {{ $machine->number }}</p>
                        <p><strong>Состояние:</strong> {{ $machine->condition }}</p>
                        <p><strong>Счетчик наличных:</strong> {{ $machine->cash_counter }}</p>
                        <p><strong>Баланс:</strong> {{ $machine->balance }}</p>
                        <p><strong>Продано товаров:</strong> {{ $machine->goods_sold }}</p>
                        <p><strong>Всего товаров:</strong> {{ $machine->goods_total }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
</body>
