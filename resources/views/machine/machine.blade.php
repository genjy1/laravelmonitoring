@include('components.head')
@include('components.header')
<body>
    <div class="container my-0 mx-auto w-4/5">
        @if($machine->status == 'Offline')
            <div class="error-message bg-red-500">
                <p class="p-1.5">
                    Нет связи с автоматом. Удаленное управление недоступно.
                </p>
            </div>
            <div>
                <p>
                    Основные сведения об автомате.
                    <br>
                    Вы можете изменить некоторые поля и нажать "Сохранить", чтобы запомнить изменения. Некоторые функции могут быть доступны только в режиме "Online".
                </p>
            </div>
        @endif
    </div>
</body>
