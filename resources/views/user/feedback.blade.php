@include('components.head')
@include('components.header')
<body>
@if(session('success'))
    {{session('success')}}
@endif
    <div class="container mx-auto my-0 w-4/5">
        <h1 class="pb-4">Обратная связь</h1>
        <hr>
        <p class="py-4">
            Если у вас есть вопросы или предложения по работе сервиса или вы хотите сообщить об ошибке, заполните форму ниже.
            <br>
            Мы обязательно свяжемся с вами по электронной почте.
        </p>
        <hr>
        <form action="{{route('common.sendFeedback')}}" class="feedback-form pt-4" id="feedback" method="POST">
            @csrf
            <div class="input-group pb-4">
                <label for="theme" class="flex flex-col gap-2 font-bold">
                    Тема сообщения
                    <input type="text" name="theme" id="theme" placeholder="Тема сообщения" class="rounded border font-normal px-4 py-1">
                </label>
                <p class="text-sm  text-[#737373]">До 50 символов</p>
            </div>
            <div class="input-group">
                <label for="message" class="flex flex-col gap-2 font-bold">
                    Текст сообщения
                    <textarea name="message" id="message" cols="30" rows="10" class="rounded border resize-none font-normal "></textarea>
                </label>
            </div>
            <button type="submit" class="mt-4 bg-[#337ab7] px-4 py-2 rounded text-white">Отправить</button>
        </form>
    </div>
</body>
