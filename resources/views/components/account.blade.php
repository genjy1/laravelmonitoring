    <h1 class="pb-4 text-2xl">Редактирование профиля</h1>
    <hr class="pb-4">
    <p>Здесь вы можете изменить данные вашего аккаунта</p>
    <div class="actions-wrapper pt-4 flex-col flex gap-4">
        <form action="{{route('changeFio',$user->id)}}" class="flex flex-col gap-2 border-b pb-4" method="post">
            @csrf
            @method('patch')
            <label for="fio" class="font-bold">ФИО (организация)
            </label>
            <input type="text" name="fio" id="fio" value="{{$user->fio}}" class="border rounded px-4 py-2">
            <button type="submit" class="border rounded sm:max-w-[90px] text-sm py-2">Изменить</button>
        </form>
        <form action="{{route('changeUserName',\Illuminate\Support\Facades\Auth::user()->id)}}" class="flex flex-col gap-2 border-b pb-4" method="POST">
            @csrf
            @method('PATCH')
            <label for="user_name" class="font-bold">
                Имя пользователя:
            </label>
            <input type="text" id="user_name" name="user_name" value="{{$user->user_name}}" class="border rounded px-4 py-2">
            <button type="submit" class="border rounded sm:max-w-[90px] text-sm py-2">Изменить</button>
            <p>
                От 2 до 64 символов, можно использовать буквы латинского алфавита (a-Z) и цифры
            </p>
        </form>
        <form action="{{route('changeEmail',$user->id)}}" method="post" class="flex flex-col gap-2 border-b pb-4">
            @method('patch')
            @csrf
            <label for="user_email" class="font-bold">
                Email
            </label>
            <input type="email" name="user_email" id="user_email" value="{{$user->user_email}}" class="border rounded px-4 py-2">
            <button type="submit" class="border rounded sm:max-w-[90px] text-sm py-2">Изменить</button>
        </form>
        <form action="{{route('changeTz',$user->id)}}" class="flex flex-col gap-2 border-b pb-4" method="post">
            @method('patch')
            @csrf
            <label for="user_tz" class="font-bold">
                Временная зона
            </label>
            <select name="user_tz" id="user_tz"  class="border rounded px-4 py-2">
                @foreach($timezones as $tz)
                    <option value="{{$tz}}" {{$tz === $user->user_tz ? 'selected' : ''}}>
                        {{$tz}}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="border rounded sm:max-w-[90px] text-sm py-2">Изменить</button>
        </form>
        <form action="{{route('changePassword',$user->id)}}" class="flex flex-col gap-2 border-b pb-4" method="post">
            @method('patch')
            @csrf
            <label for="password" class="font-bold">Изменение пароля</label>
            <input type="password" name="password" id="password" class="border rounded px-4 py-2">
            <button type="submit" class="border rounded sm:max-w-[90px] text-sm py-2">Изменить</button>
        </form>
        @if($user->role === 'admin')
            <form action="{{route('changeRole',$user->id)}}" class="flex flex-col gap-2 border-b pb-4" method="POST">
                @method('patch')
                @csrf
                <label for="role" class="flex flex-col">
                    Роль
                    <input type="text" id="role" name="role" value="{{$user->role}}" class="border rounded px-4 py-2">
                </label>
                <button type="submit" class="border rounded mx-auto my-0 max-w-[300px] px-4 py-2">Отправить</button>
            </form>
        @endif
    </div>
