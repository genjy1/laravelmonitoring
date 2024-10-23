@include('components.head')
<body>
<div class="container mx-auto my-0 pt-10">
    <h1 class="pb-4 font-medium text-3xl">Восстановление доступа</h1>
    <hr class="py-4">
    <p class="max-w-[940px]">
        Пожалуйста, укажите ваше <span class="highlight bg-amber-100">имя пользователя</span> и нажмите кнопку "Восстановить пароль".
        <br>
        Мы пришлем письмо со ссылкой для восстановления доступа на тот адрес электронной почты, который вы указывали при регистрации.
    </p>
    <form action="{{route('forgot-password-post')}}" method="post" class="">
        @csrf
        <label for="name">
            <input type="text" name="name" class="px-4 py-2 border rounded">
        </label>
        <hr class="my-2">
        <button type="submit">Восстановить пароль</button>
    </form>
    <a href="{{route('common.home')}}" class="back mt-2">Назад</a>
</div>
</body>
