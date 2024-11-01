@include('components.head')
<body>
    @include('components.header')
    <main class="mx-auto mt-20 w-4/5">
        <h1 class="text-3xl pb-2 mt-3 font-semibold flex items-center justify-between">Состояние автоматов</h1>
        <hr>
        <table class="table-auto w-full border mt-4">
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
                        <td class="p-2 border-r">{{  $machine->status  }}</td>
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
    </main>
</body>
