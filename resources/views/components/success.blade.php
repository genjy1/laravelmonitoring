@if(session('success'))
    <div id="flash-message" class="success-wrapper border border-green-600 rounded p-2 text-green-600 flex justify-between items-center transition-opacity duration-500 opacity-100">
        {{ session('success') }}
        <div class="round border-green-600 border rounded-full p-2 cursor-pointer" id="close-message">
            <svg class="w-4 h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
        </div>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const flashMessage = document.getElementById('flash-message');
        const closeButton = document.getElementById('close-message');

        if (flashMessage) {
            // Скрытие по кнопке
            closeButton.addEventListener('click', function () {
                flashMessage.classList.remove('opacity-100');
                flashMessage.classList.add('opacity-0');
                setTimeout(() => {
                    flashMessage.remove();
                }, 500); // Убедитесь, что время совпадает с длительностью анимации
            });

            // Авто скрытие через 5 секунд
            setTimeout(() => {
                flashMessage.classList.remove('opacity-100');
                flashMessage.classList.add('opacity-0');
                setTimeout(() => {
                    flashMessage.remove();
                }, 500);
            }, 5000); // Измените время на желаемое
        }
    });
</script>
