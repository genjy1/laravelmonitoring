import './bootstrap';

const toggleDropDownButton = document.querySelector('.toggle-dropdown')
window.addEventListener('click', (event) => {
        if (event.target.classList.contains('user-menu__button')){
        const menu = event.target.closest('.menu');
        const dropdown = menu.querySelector('.dropdown')
        dropdown.classList.toggle('hidden')
        }

})

const burger = document.querySelector('#burger')
const burgerMenu = document.querySelector('.burger-menu__container')

burger.addEventListener('click', () => {

    burger.classList.toggle('open');
})

document.getElementById('burger').addEventListener('click', function() {
    const menu = document.getElementById('menu');

    // Проверяем, открыто меню или нет
    if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
        setTimeout(() => {
            menu.classList.add('max-h-screen', 'opacity-100');
            menu.classList.remove('max-h-0', 'opacity-0');
        }, 10); // Небольшая задержка для запуска анимации
    } else {
        menu.classList.add('max-h-0', 'opacity-0');
        menu.classList.remove('max-h-screen', 'opacity-100');
        setTimeout(() => {
            menu.classList.add('hidden');
        }, 300); // Время анимации соответствует Tailwind (300ms)
    }
});

toggleDropDownButton.addEventListener('click', () => {
    const dropDownMobile = document.querySelector('.dropdown-menu__mobile');
    dropDownMobile.classList.toggle('opacity-0')
    dropDownMobile.classList.toggle('h-0')
})
