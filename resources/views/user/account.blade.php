<div class="container mx-auto my-0 w-4/5">
    @include('components.success')
    @include('debug.errors')
    <h1>Редактирование профиля</h1>
    <hr>
    <p>Здесь вы можете изменить данные вашего аккаунта</p>
    <form action=" " class="flex flex-col">
        @method('PATCH')
        @csrf
        <label for="fio">ФИО (организация)
        </label>
        <input type="text" name="fio" id="fio" value="{{$user->fio}}">
        <button type="submit">Изменить</button>
    </form>
    <form action="" class="flex flex-col">
        @method('PATCH')
        @csrf
        <label for="user_name">
            Имя пользователя:
        </label>
        <input type="text" name="user_name" value="{{$user->user_name}}">
        <button type="submit">Изменить</button>
    </form>
    <form action="" class="flex flex-col">
        @method('PATCH')
        @csrf
    </form>
    <form action="" class="flex flex-col">
        @method('PATCH')
        @csrf
    </form>
    <form action="" class="flex flex-col">
        @method('PATCH')
        @csrf
    </form>
</div>
