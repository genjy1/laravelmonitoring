@include('components.head')
<body>
    @include('components.header')
    <main class="container mx-auto mt-20 mb-0 w-4/5">
        <h1 class="text-2xl">Итоги по дням</h1>
        <hr class="my-4">
        <table class="table-auto w-full">
            <thead>
            <tr class="border-x bg-[#eee]">
                <th class="border-r border-b py-2">Дата</th>
                <th class="border-r border-b py-2">Принято денег</th>
                <th class="border-r border-b py-2">Выдано сдачи</th>
                <th class="border-r border-b py-2">Выдано товаров</th>
                <th class="border-b py-2">Выручка</th>
            </tr>
            </thead>
            <tbody>

                <tr class="odd:bg-[#eee]"></tr>
            </tbody>
        </table>
    </main>
</body>
