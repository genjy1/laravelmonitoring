@include('components.head')
<body>
    @include('components.header')
    <main class="main mx-auto mt-20 w-4/5">
        <h1 class="text-2xl">
            Распределение выручки
        </h1>
        <hr class="my-4">
        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-[#eee] border-b-2">
                    <th class="py-2">
                        #
                    </th>
                    <th class="py-2">
                        Номер
                    </th>
                    <th class="py-2">
                        Имя автомата
                    </th>
                    <th class="py-2">
                        Продано
                    </th>
                    <th class="py-2">
                        Выручка
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($sold as $sale)
                    <tr class="border-b last-of-type:border-b-none">
                        <td class="text-center border-r py-2">{{$sale->id}}</td>
                        <td class="text-center border-r py-2">{{$sale->machine->number}}</td>
                        <td class="text-center border-r py-2">{{$sale->machine->name}}</td>
                        <td class="text-center border-r py-2">{{$sale->count()}}</td>
                        <td class="text-center py-2"></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-[#eee]">
                    <th class="py-2">Всего:</th>
                    <th class="py-2"></th>
                    <th class="py-2"></th>
                    <th class="py-2">758,05</th>
                    <th class="py-2">111699,40</th>
                </tr>
            </tfoot>
        </table>
        <div class="chart-container">
            <div class="chart"></div>
            <div class="chart"></div>
        </div>
    </main>
</body>
