@include('components.head')
<body>
    @include('components.header')
    <main class="mx-auto mt-20 w-4/5">
        <h1 class="text-3xl pb-2 mt-3 font-semibold flex items-center justify-between">Состояние загрузки</h1>
        <hr>
        <table class="table-auto w-full border-x mt-6">
            <thead>
                <tr class="capitalize border-y bg-[#eee]">
                    <th class="font-normal border-r py-2 px-4 text-nowrap"># автомата</th>
                    <th class="font-normal border-r py-2 px-4">адрес</th>
                    <th class="font-normal border-r py-2 px-4">автомат</th>
                    <th class="font-normal border-r py-2 px-4 text-nowrap"># продукта</th>
                    <th class="font-normal border-r py-2 px-4">код продукта</th>
                    <th class="font-normal border-r py-2 px-4">продукт</th>
                    <th class="font-normal border-r py-2 px-4 text-nowrap">годен до</th>
                    <th class="font-normal border-r py-2 px-4">вместимость</th>
                    <th class="font-normal border-r py-2 px-4">остаток</th>
                    <th class="font-normal py-2 px-4 ">добавить</th>
                </tr>
            </thead>
            <tbody>
                @foreach($goods as $good)
                    <tr class="border-y hover:bg-gray-100/75">
                        <td class="font-normal border-r py-2 px-4 text-center">{{ $good->id }}</td>
                        <td class="font-normal border-r py-2 px-4">{{ $good->machine->address }}</td>
                        <td class="font-normal border-r py-2 px-4">{{ $good->machine->name ?? 'N/A' }}</td>
                        <td class="font-normal border-r py-2 px-4">{{ $good->id }}</td>
                        <td class="font-normal border-r py-2 px-4">{{ $good->code }}</td>
                        <td class="font-normal border-r py-2 px-4">{{ $good->name }}</td>
                        <td class="font-normal border-r py-2 px-4">{{ $good->valid ?? 'n/a' }}</td>
                        <td class="font-normal border-r py-2 px-4">{{ $good->machine->capacity ?? 'N/A' }}</td>
                        <td class="font-normal border-r py-2 px-4">{{ $good->remains }}</td>
                        <td class="font-normal py-2 px-4">0</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination mt-4">
            {{$goods->links()}}
        </div>
    </main>
</body>
