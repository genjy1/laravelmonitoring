@include('components.head')
@include('components.header')
<div class="container mx-auto my-o w-4/5">
    <h1 class="pb-2 text-3xl">Привязка автомата</h1>
    <hr>
    <div class="sm:py-10 py-4">
        <p>Для выполнения привязки предварительно разрешите автомату подключение к сети и работу мониторинга.</p>
        <p>Привязка осуществляется по ID контроллера автомата и ID текущей сессии.</p>
        <p>ID контроллера автомата выводится в меню <span class="highlight bg-amber-100">Настройки > Автомат > Инфо > ID контроллера.</span></p>
        <p>ID текущей сессии выводится в меню <span class="highlight bg-amber-100">Настройки > Мониторинг > Показать UID.</span>
            Обратите внимание, что ID сессии <span class="font-bold">изменится</span> сразу после перезапуска автомата!</p>
    </div>
    <hr>
    <div class="form-wrapper mt-4">
        <form action="#" class="flex flex-col gap-2">
            <div class="input-group">
                <label for="controller_id" class="flex flex-col gap-2">
                    ID контроллера
                    <input type="text" name="controller_id" id="controller_id" placeholder="ID контроллера" class="border rounded px-4 py-2 sm:max-w-[300px]">
                </label>
                <p class="text-sm text-gray-400">8 символов</p>
            </div>
            <div class="input-group">
                <label for="session_id" class="flex flex-col gap-2">
                    ID сессии
                    <input type="text" name="session_id" id="session_id" placeholder="ID сессии" class="border rounded px-4 py-2 sm:max-w-[300px]">
                </label>
                <p class="text-sm text-gray-400">8 символов</p>
            </div>

            <button type="submit" class="text-white rounded bg-[#337ab7] px-4 py-2 sm:max-w-[200px] mt-4">Привязать</button>
            <hr class="mt-3">
        </form>
        @include('components.back')
    </div>
</div>
