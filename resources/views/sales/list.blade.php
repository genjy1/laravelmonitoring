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
        <hr class="my-4">
        <table class="table-auto w-full hidden sm:table">
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
        <div class="flex flex-wrap gap-4 sm:hidden">
            @foreach($sales as $sale)
                <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1rem)]">
                    <div class="text-center font-semibold text-lg mb-2">Machine ID: {{ $sale->machine_id }}</div>
                    <div class="mb-2">
                        <span class="font-medium">Date:</span> {{ $sale->dateTime }}
                    </div>
                    <div class="mb-2">
                        <span class="font-medium">Accepted Money:</span> ${{ $sale->accepted_money }}
                    </div>
                    <div class="mb-2">
                        <span class="font-medium">Change Given:</span> ${{ $sale->change_given }}
                    </div>
                    <div class="mb-2">
                        <span class="font-medium">Revenue:</span> ${{ $sale->revenue }}
                    </div>
                    <div class="text-center">
                        <!-- Additional buttons or actions go here if needed -->
                    </div>
                </div>
            @endforeach
        </div>


        <!-- Пагинация -->
        <div class="pagination">
            {{ $sales->links() }}
        </div>

    </main>
</body>
