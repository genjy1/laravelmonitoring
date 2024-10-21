@include('components.head')
<body>

<div class="container mx-auto my-0 w-4/5 pt-10 py-5">
    <h1 class="text-3xl pb-2">Регистрация пользователя</h1>

    <hr class="pb-2.5">

    <form method="post" action="{{route('registerPost')}}" class="flex-col flex gap-4" novalidate>
        @csrf
        <div class="input-group">
            <label for="fio" class="register-input__label max-w-[400px]">
                Фамилия Имя Отчество или название организации
                <input type="text" name="fio" id="fio" class="border rounded-sm px-3 py-1.5" placeholder="ФИО или организация">
                @if($errors->has('fio'))
                    <span class="text-red-500 text-sm">{{ $errors->first('fio') }}</span>
                @endif
            </label>
        </div>
        <div class="input-group">
            <label for="user_name" class="register-input__label max-w-[400px]">
                Имя пользователя
                <input type="text" name="user_name" id="user_name" class="border rounded-sm px-3 py-1.5" placeholder="Имя пользователя">
                @if($errors->has('user_name'))
                    <span class="text-red-500 text-sm">{{ $errors->first('user_name') }}</span>
                @endif
            </label>
            <p class="text-sm text-[#737373]">От 2 до 64 символов, можно использовать буквы латинского алфавита (a-Z) и цифры</p>
        </div>
        <div class="input-group">
            <label for="user_email" class="register-input__label max-w-[400px]">
                Адрес электронной почты
                <input type="email" name="user_email" id="user_email" class="border rounded-sm px-3 py-1.5" placeholder="Email">
                @if($errors->has('user_email'))
                    <span class="text-red-500 text-sm">{{ $errors->first('user_email') }}</span>
                @endif
            </label>
            <p class="text-sm text-[#737373]">На указанный адрес вам будет отправлено письмо со ссылкой для подтверждения регистрации</p>
        </div>
        <div class="input-group">
            <label for="user_tz" class="register-input__label max-w-[400px]">
                Временная зона
                <select name="user_tz" id="user_tz" class="border px-3 py-1.5">
                    @foreach($timezones as $timezone)
                        <option value="{{$timezone}}" class="border px-3 py-1.5">
                            {{$timezone}}
                        </option>
                    @endforeach
                </select>
                <p class="text-sm text-[#737373]">Ваш часовой пояс</p>
            </label>
        </div>
        <div class="input-group">
            <label for="password" class="register-input__label max-w-[400px]">
                Придумайте пароль
                <input type="password" id="password" name="password" class="border rounded-sm px-3 py-1.5" placeholder="Пароль">
                @if($errors->has('password'))
                    <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                @endif
            </label>
            <p class="text-sm text-[#737373]">Не менее 8 символов</p>
        </div>
        <button type="submit" class="max-w-[140px] bg-[#337ab7] text-white px-4 py-2.5 rounded">Регистрация</button>
    </form>

    <a href="{{route('common.home')}}">Назад</a>
</div>
</body>
