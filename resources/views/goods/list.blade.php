@include('components.head')
<body>
    @include('components.header')
    <main class="main container mx-auto my-0 w-4/5 mt-24">
        @include('components.success')
        <header class="header flex items-center justify-between">
            <h1 class="text-3xl pb-2 sm:mt-3 font-semibold flex items-center justify-between">Список товаров</h1>
            <button class="flex sm:button add-btn rounded font-normal p-2 text-center outline-none">
                <span class="hidden sm:block border-2 p-2 rounded hover:bg-[#777] hover:text-white transition hover:border-transparent">
                    Добавить
                </span>
                <span class="icon sm:hidden">
                    <svg width="32" height="32" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <!-- Круг -->
                        <circle cx="50" cy="50" r="45" stroke="black" stroke-width="5" fill="none" />
                        <!-- Горизонтальная линия плюса -->
                        <line x1="50" y1="30" x2="50" y2="70" stroke="black" stroke-width="6" />
                        <!-- Вертикальная линия плюса -->
                        <line x1="30" y1="50" x2="70" y2="50" stroke="black" stroke-width="6" />
                    </svg>
                </span>
            </button>
        </header>
        <hr class="py-2">
        <table class="w-full border-collapse border border-gray-300 sm:table hidden">
            <thead>
            <tr class="border-b bg-[#eee]">
                <th class="border-r font-normal py-2">Код</th>
                <th class="border-r font-normal py-2">Наименование</th>
                <th class="text-right w-[100px]">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($goods as $good)
                <tr class="border-b hover:bg-[#eee] goods-row">
                    <td class="border-r py-2 px-2 text-center">
                        {{$good->code}}
                    </td>
                    <td class="border-r py-2 px-2 text-center">
                        {{$good->name}}
                    </td>
                    <td class="border-r py-2 px-2">
                        <form action="{{ route('goods.destroy',$good->id) }}" method="post" class="m-0 text-center">
                            @method('patch')
                            @csrf
                            <button type="submit" class="p-0 m-0 w-8">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="grid gap-4 sm:hidden">
            @foreach($goods as $good)
                <div class="border rounded-lg shadow-md p-4 bg-white hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-between mb-2">
                        <h3 class="font-semibold text-left w-full text-lg">{{ $good->name }}</h3>
                        <span class="text-sm font-semibold text-gray-600">Код: {{ $good->code }}</span>
                    </div>
                    <div class="text-right">
                        <form action="{{ route('goods.destroy', $good->id) }}" method="post" class="inline">
                            @method('patch')
                            @csrf
                            <button type="submit" class="p-1 text-red-600 hover:text-red-800">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <dialog class="modal rounded sm:w-2/4 w-4/5">
                <header class="border-b">
                    <div class="container-modal flex justify-between gap-2 p-[15px]">
                        Добавить новую запись
                        <button class="close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="red">
                                <line x1="8" y1="8" x2="16" y2="16" stroke="#000000" stroke-width="2"/>
                                <line x1="16" y1="8" x2="8" y2="16" stroke="#000000" stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                </header>
                <form action="{{route('goods.store')}}" method="post" class="flex flex-col p-[15px] m-0 gap-2">
                    @csrf
                    <label for="code" class="flex flex-col">
                        Код товара
                        <input type="text" name="code" id="code" class="px-4 py-2 border rounded ">
                    </label>
                    <label for="name" class="flex flex-col">
                        Наименование товара
                        <input type="text" name="name" id="name" class="px-4 py-2 border rounded ">
                    </label>
                    <button type="submit" class="bg-[#337ab7] rounded text-white px-2 py-4">Сохранить</button>
                </form>
            </dialog>
    </main>
</body>
