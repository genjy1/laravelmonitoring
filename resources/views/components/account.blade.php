<div class="container mx-auto my-0 w-4/5">
    <h1 class="pb-4 text-2xl">Редактирование профиля</h1>
    <hr class="pb-4">
    <p>Здесь вы можете изменить данные вашего аккаунта</p>
    <div class="actions-wrapper pt-4 flex-col flex gap-4">
        <form action="" class="flex flex-col gap-2 border-b pb-4" method="POST">
            @csrf
            @method('patch')
            <label for="fio">ФИО (организация)
            </label>
            <input type="text" name="fio" id="fio" value="{{$user->fio}}" class="border rounded px-4 py-2">
            <button type="submit" class="border rounded sm:max-w-[90px] text-sm py-2">Изменить</button>
        </form>
        <form action="{{route('changeUserName',\Illuminate\Support\Facades\Auth::user()->id)}}" class="flex flex-col gap-2 border-b pb-4" method="POST">
            @csrf
            @method('PATCH')
            <label for="user_name">
                Имя пользователя:
            </label>
            <input type="text" id="user_name" name="user_name" value="{{$user->user_name}}" class="border rounded px-4 py-2">
            <button type="submit" class="border rounded sm:max-w-[90px] text-sm py-2">Изменить</button>
            <p>
                От 2 до 64 символов, можно использовать буквы латинского алфавита (a-Z) и цифры
            </p>
        </form>
        <form action="" class="flex flex-col gap-2 border-b pb-4">
            @method('PATCH')
            <label for="user_email">
                Email
            </label>
            <input type="email" name="user_email" id="user_email" {{$user->user_email}} class="border rounded px-4 py-2">
            <button type="submit" class="border rounded sm:max-w-[90px] text-sm py-2">Изменить</button>
        </form>
        <form action="" class="flex flex-col gap-2 border-b pb-4">
            @method('PATCH')
        </form>
        <form action="" class="flex flex-col gap-2 border-b pb-4">
            @method('PATCH')
        </form>
    </div>
</div>
