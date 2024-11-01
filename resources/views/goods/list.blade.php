@include('components.head')
<body>
    @include('components.header')
    <main class="main container mx-auto my-0 w-4/5 mt-24">
        @include('components.success')
        <header class="header flex items-center justify-between">
            <h1 class="text-3xl pb-2 mt-3 font-semibold flex items-center justify-between">Список товаров</h1>
            <button class="add-btn rounded font-normal p-2 text-center outline-none">Добавить</button>
        </header>
        <hr class="py-2">
        <table class="w-full border-collapse border border-gray-300">
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
                        <div class="flex justify-center items-center">
                            <input type="text" name="code" id="code" value="{{$good->code}}" class="w-full text-center outline-none goods-input">
                        </div>
                    </td>
                    <td class="border-r py-2 px-2 text-center">
                        <div class="flex justify-center items-center">
                            <input type="text" name="name" id="name" value="{{$good->name}}" class="w-full text-center outline-none goods-input">
                        </div>
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
        <dialog class="modal rounded w-2/4">
                <header class="border-b">
                    <div class="container flex justify-between gap-2 p-[15px]">
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
