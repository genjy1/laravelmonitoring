@include('components.head')

<body class="bg-[url('https://online.vend-shop.com/images/bg_signin_large.png')] bg-top bg-no-repeat font-futura">
<div class="container mx-auto my-0 w-3/4 pt-5 pb-10">
    <h1 class="uppercase text-5xl font-bold text-center text-white my-5">vendshop online</h1>
    <form action="{{ route('loginPost') }}" method="POST" class="max-w-[300px] mx-auto my-0">
        @csrf
        <h2 class="my-2.5 text-[20px] text-center">Вход в систему</h2>
        <div class="input-group flex-col flex gap-2">

            <label for="user_name" class="sr-only">Имя пользователя</label>
            <input type="text" name="name" id="name" placeholder="Имя пользователя" required class="p-3 bg-white text-[#555] font-bold border">

            <label for="password" class="sr-only">Пароль</label>
            <input type="password" name="password" id="user_password" placeholder="Пароль" required class="p-3 bg-white text-[#555] font-bold border">

            <div class="checkbox">
                <label for="user_rememberme" class="text-sm">
                    <input type="checkbox" id="user_rememberme" name="user_rememberme">
                    Запомнить меня
                </label>
            </div>

            <div class="flex flex-col">
                <button type="submit" class="bg-[#6E417E] text-lg text-white font-bold cursor-pointer max-w-[330px] px-4 py-2.5">Войти</button>
            </div>

            <div class="user-actions flex flex-col">
                <a href="{{ route('showRegisterView') }}" class="register font-futuraBook">Регистрация</a>
                <a href="#" class="forget-password font-futuraBook">Забыли пароль?</a>
            </div>

            <div class="banner-wrapper">
                <a href="https://vend-shop.com/kofejnja-samoobsluzhivanija-kofe-point-koffee-space/" class="banner-link">
                    <img src="https://vend-shop.com/image/catalog/Banner_vso/coffee-space-banner.png" alt="Banner" class="banner-img">
                </a>
            </div>
        </div>
    </form>
</div>
</body>
