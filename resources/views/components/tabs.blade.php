<div class="container mt-24 w-4/5 mx-auto">
    <nav class="max-w-[650px]">
        <ul class="flex justify-between flex-col sm:flex-row gap-8">
            <li>
                <a href="{{route('user.edit',\Illuminate\Support\Facades\Auth::user()->id)}}" class="bg-transparent flex rounded py-2 px-4 border shadow-none transition duration-300 ease-in-out hover:shadow-[0_4px_10px_rgba(147,51,234,0.5)] sm:py-2 sm:px-4">Редактировать данные аккаунта</a>
            </li>
            <li>
                <a href="{{route('user.edit.requisites',\Illuminate\Support\Facades\Auth::user()->id)}}" class="bg-transparent flex rounded py-2 px-4 border shadow-none transition duration-300 ease-in-out hover:shadow-[0_4px_10px_rgba(147,51,234,0.5)] sm:py-2 sm:px-4">Редактировать данные реквизитов</a>
            </li>
        </ul>
    </nav>
</div>
