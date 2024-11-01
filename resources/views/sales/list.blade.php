@include('components.head')
<body>
    @include('components.header')
    <main class="container mx-auto mt-20 5 w-4/5">
        <div class="table-header flex justify-between items-center mb-2">
            <h1 class="text-2xl">Журнал продаж</h1>
            <form action="{{route('sales.download')}}" class="m-0">
                <button type="submit" class="border rounded px-2 py-1 hover:bg-[#e6e6e6]">Экспорт</button>
            </form>
        </div>
        <hr>
        <table class="table-auto w-full">
            <thead>
            <tr class="bg-[#eee] border-x">
                <th class="border-r font-normal py-2">
                    <a href="{{ route('sales.index', ['sort' => 'machine_id', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                        № автомата
                    </a>
                </th>
                <th class="border-r font-normal py-2">
                    <a href="{{ route('sales.index', ['sort' => 'dateTime', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                        Дата и время
                    </a>
                </th>
                <th class="border-r font-normal py-2">
                    <a href="{{ route('sales.index', ['sort' => 'accepted_money', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                        Принято денег
                    </a>
                </th>
                <th class="border-r font-normal py-2">
                    <a href="{{ route('sales.index', ['sort' => 'change_given', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                        Выдано сдачи
                    </a>
                </th>
                <th class="border-r font-normal py-2">
                    <a href="{{ route('sales.index') }}">Товары</a>
                </th>
                <th class="font-normal py-2">
                    <a href="{{ route('sales.index', ['sort' => 'revenue', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                        Выручка
                    </a>
                </th>
                <!-- Другие заголовки столбцов -->
            </tr>
            </thead>
            <tbody>
            @foreach($sales as $sale)
                <tr class="border-b border-x even:bg-[#eee]">
                    <td class="text-center py-2 border-r">{{ $sale->machine_id }}</td>
                    <td class="text-center py-2 border-r">{{ $sale->dateTime }}</td>
                    <td class="text-center py-2 border-r">{{ $sale->accepted_money }}</td>
                    <td class="text-center py-2 border-r">{{ $sale->change_given }}</td>
                    <td class="text-center py-2 border-r">{{ $sale->revenue }}</td>
                    <td class="text-center py-2"></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Пагинация -->
        <div class="pagination">
            {{ $sales->links() }}
        </div>

    </main>
</body>
