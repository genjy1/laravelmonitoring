@include('components.head')
<body>
    @include('components.header')
    <main class="mt-20 mx-auto my-0 w-4/5">
        <div class="wrapper">
            <header class="wrapper-header max-w-[718px] mb-6">
                <h1 class="pb-2 text-2xl">Общая статистика</h1>
                <hr>
            </header>
            <div class="panel rounded border bg-[#f5f5f5] max-w-[718px] mb-6">
                <header class="px-3 py-2 border-b">
                    <h2>Период</h2>
                </header>
                <div class="panel-body p-3.5 bg-white">
                    <form action="#" class="flex-col flex gap-4 items-start">
                        <div class="date-input__group flex items-center gap-4">
                            <label for="datetime-picker">
                                Начало периода
                            </label>
                            <input type="text" id="datetime-picker" class="border font-normal border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Выберите дату"/>
                        </div>
                        <div class="date-input__group flex items-center gap-4 w-[336px] justify-between">
                            <label for="datetime-picker ml-4">Конец периода</label>
                            <input type="text" id="datetime-picker" class="border font-normal border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Выберите дату"/>
                        </div>
                        <button type="submit" class="border px-2 py-2 rounded">Применить</button>
                    </form>
                </div>
            </div>
            <div class="panel rounded border max-w-[718px] mb-6">
                <header class="px-3 py-2 border-b bg-[#f5f5f5] rounded-t">
                    <h2>Продажи</h2>
                </header>
                <table>
                    <thead>
                    <tr class="border-b bg-[#eee]">
                        <th class="w-[359px] text-left border-r p-2"></th>
                        <th class="w-[230px] text-left border-r p-2">Выдано товаров</th>
                        <th class="w-[130px] text-left p-2">Выручка</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b">
                        <td class="font-bold border-r p-2.5">Всего</td>
                        <td class="p-2 border-r"></td>
                        <td class="p-2"></td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-bold border-r p-2.5">Наличный расчет</td>
                        <td class="p-2 border-r"></td>
                        <td class="p-2"></td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-bold border-r p-2.5">Безналичный расчет</td>
                        <td class="p-2 border-r"></td>
                        <td class="p-2"></td>
                    </tr>
                    <tr>
                        <td class="font-bold border-r p-2.5">Тестовые продажи</td>
                        <td class="p-2 border-r"></td>
                        <td class="p-2"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel rounded border max-w-[718px]">
                <header class="panel-header px-3 py-2 border-b bg-[#f5f5f5] rounded-t">
                    <h2>Статистика по наличным</h2>
                </header>
                <table>
                    <thead>
                        <tr class="border-b bg-[#eee] border-r">
                            <th class="w-[359px]">
                            </th>
                            <th class="p-2 w-[128px] border-r">
                                Монеты
                            </th>
                            <th class="p-2 w-[132px] border-r">
                                Купюры
                            </th>
                            <th class="p-2 w-[100px]">
                                Всего
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b">
                        <td class="p-2 font-bold border-r">Принято денег</td>
                        <td class="border-r"></td>
                        <td class="border-r"></td>
                        <td></td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 font-bold border-r">
                            Выдано сдачи
                        </td>
                        <td class="border-r"></td>
                        <td class="border-r"></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#datetime-picker", {
            dateFormat: "Y-m-d H:i",
        });
    </script>
</body>
