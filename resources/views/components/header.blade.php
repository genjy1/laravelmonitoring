    <header class="border-b bg-white border-gray-200 text-[#777] mb-5 fixed w-full top-0 header">
    <div class="mx-auto my-0 w-4/5 py-4 items-center justify-between hidden sm:flex">
        <a href="{{route('common.home',\Illuminate\Support\Facades\Auth::user()->id)}}" class="font-semibold text-lg">VendShop Online</a><nav class="list">
            <ul class="nav-list gap-5 flex">
                <li class="relative">
                    <button class="dropdown-nav flex items-center" id="machineDropdownButton">
                        Автоматы
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.358l3.71-3.149a.75.75 0 111.02 1.096l-4.24 3.6a.75.75 0 01-.99 0l-4.24-3.6a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul class="dropdown-list absolute left-0 mt-2 w-48 bg-white shadow-lg hidden" id="dropdownMachineList">
                        <li><a href="{{route('machine.showState',Auth::user()->id)}}" class="block px-4 py-2 text-right hover:bg-gray-100">Состояние автоматов</a></li>
                        <li><a href="{{ route('common.home',\Illuminate\Support\Facades\Auth::user()->id) }}" class="block px-4 py-2 text-left hover:bg-gray-100">Список автоматов</a></li>
                    </ul>
                </li>
                <li class="relative">
                    <button class="dropdown-nav flex items-center" id="goodsDropdownButton">
                        Товары
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.358l3.71-3.149a.75.75 0 111.02 1.096l-4.24 3.6a.75.75 0 01-.99 0l-4.24-3.6a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul class="dropdown-list absolute left-0 mt-2 w-48 bg-white shadow-lg hidden" id="dropdownGoodsList">
                        <li><a href="{{route('goods.state',Auth::user()->id)}}" class="block px-4 py-2 hover:bg-gray-100">Состояние загрузки</a></li>
                        <li><a href="{{ route('goods.list', \Illuminate\Support\Facades\Auth::user()->id) }}" class="block px-4 py-2 hover:bg-gray-100">Список товаров</a></li>
                    </ul>
                </li>
                <li class="relative"><a href="{{ route('sales.index') }}">Журнал продаж</a></li>
                <li class="relative">
                    <button class="dropdown-nav flex items-center" id="statsDropdownButton">
                        Статистика
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.358l3.71-3.149a.75.75 0 111.02 1.096l-4.24 3.6a.75.75 0 01-.99 0l-4.24-3.6a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul class="dropdown-list absolute left-0 mt-2 w-48 bg-white shadow-lg hidden" id="dropdownStatsList">
                        <li><a href="{{route('stats.index')}}" class="block px-4 py-2 hover:bg-gray-100">Общая статистика</a></li>
                        <li><a href="{{route('stats.byDays')}}" class="block px-4 py-2 hover:bg-gray-100">Итоги по дням</a></li>
                        <li><a href="" class="block px-4 py-2 hover:bg-gray-100">Инкассации</a></li>
                        <hr>
                        <li><a href="{{route('stats.proceeds')}}" class="block px-4 py-2 hover:bg-gray-100">Распределение выручки</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="menu">
            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="drop-button flex items-center">
                    <a href="#" class="cursor-pointer user-menu__button">{{ \Illuminate\Support\Facades\Auth::user()->user_name}}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 -mr-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.358l3.71-3.149a.75.75 0 111.02 1.096l-4.24 3.6a.75.75 0 01-.99 0l-4.24-3.6a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="dropdown absolute top-16 right-4 md:right-12 lg:right-48 bg-white p-4 hidden border shadow max-w-xs md:max-w-md lg:max-w-lg">
                    <ul class="dropdown-list flex flex-col gap-2 text-right">
                        <li class="list-item text-sm w-full">
                            <a href="{{ route('user.edit', \Illuminate\Support\Facades\Auth::user()->id) }}">Редактировать данные аккаунта</a>
                        </li>
                        <li class="list-item text-sm w-full">
                            <a href="{{ route('common.feedback') }}" class="feedback">Обратная связь</a>
                        </li>
                        <li class="list-item text-sm w-full">
                            @include('components.logout')
                        </li>
                    </ul>
                </div>

            @endif
        </div>
    </div>
        <div class="mx-auto my-0 w-4/5 py-4  items-center justify-between sm:hidden flex">
        <div class="logo">
            <a href="{{route('common.home',\Illuminate\Support\Facades\Auth::user()->id)}}" class="logo-link font-semibold text-lg">
                VendShop Online
            </a>
        </div>
            <button id="burger" class="block md:hidden focus:outline-none">
                <div class="w-6 h-1 bg-[#777] my-1 transition-transform duration-300"></div>
                <div class="w-6 h-1 bg-[#777] my-1 transition-transform duration-300"></div>
                <div class="w-6 h-1 bg-[#777] my-1 transition-transform duration-300"></div>
            </button>

            <div id="menu" class="burger-menu__container hidden max-h-0 overflow-hidden opacity-0 top-14 absolute bg-[#f8f8f8] w-full -left-0 transition-all duration-300 ease-in-out">
                <ul class="burger-menu mx-auto my-0 w-4/5 pb-4">
                    <li class="py-2">
                        <a href="{{route('common.home',\Illuminate\Support\Facades\Auth::user()->id)}}">Автоматы</a>
                    </li>
                    <li class="py-2">
                        <a href="{{route('goods.list', \Illuminate\Support\Facades\Auth::user()->id)}}">Товары</a>
                    </li>
                    <li class="py-2">
                        <a href="#">Журнал продаж</a>
                    </li>
                    <li class="py-2">
                        <a href="#">Статистика</a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li class="dropdown py-2">
                            <button class="toggle-dropdown">
                                {{\Illuminate\Support\Facades\Auth::user()->user_name}}
                            </button>
                            <ul class="dropdown-menu__mobile opacity-0 h-0">
                                <li><a href="{{route('user.edit',\Illuminate\Support\Facades\Auth::user()->id)}}" class="">Редактировать данные аккаунта</a></li>
                                <li><a href="{{route('common.feedback')}}" class="">Обратная связь</a></li>
                                <li class="">
                                    @include('components.logout')
                                </li>
                            </ul>
                        </li>

                    @endif
            </div>

    </div>
</header>

