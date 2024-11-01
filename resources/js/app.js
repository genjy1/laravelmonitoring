import "/resources/js/bootstrap.js";
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

const toggleDropDownButton = document.querySelector('.toggle-dropdown');
const burger = document.querySelector('#burger');
const balanceBtn = document.querySelector('.balance-btn');
const balanceInput = document.querySelector('.balance-input');
const machineEditForm = document.querySelector('.machine-edit__form');
const machineDropDownButton = document.querySelector('#machineDropdownButton');
const goodsDropDownButton = document.querySelector('#goodsDropdownButton');

try {
    if (burger) {
        burger.addEventListener('click', () => {
            burger.classList.toggle('open');

            const menu = document.getElementById('menu');
            if (menu) {
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                    setTimeout(() => {
                        menu.classList.add('max-h-screen', 'opacity-100');
                        menu.classList.remove('max-h-0', 'opacity-0');
                    }, 10);
                } else {
                    menu.classList.add('max-h-0', 'opacity-0');
                    menu.classList.remove('max-h-screen', 'opacity-100');
                    setTimeout(() => {
                        menu.classList.add('hidden');
                    }, 300);
                }
            }
        });
    }

    if (balanceBtn && balanceInput) {
        balanceBtn.addEventListener('click', () => {
            balanceInput.disabled = !balanceInput.disabled;
            balanceInput.focus();
        });
    }

    if (toggleDropDownButton) {
        toggleDropDownButton.addEventListener('click', () => {
            const dropDownMobile = document.querySelector('.dropdown-menu__mobile');
            if (dropDownMobile) {
                dropDownMobile.classList.toggle('opacity-0');
                dropDownMobile.classList.toggle('h-0');
            }
        });
    }

    if (machineEditForm && balanceInput) {
        machineEditForm.addEventListener('submit', () => {
            balanceInput.disabled = false;
        });
    }

} catch (e) {
    console.error('Error initializing event listeners:', e);
}

window.addEventListener('click', (event) => {
    if (event.target.classList.contains('user-menu__button')) {
        const menu = event.target.closest('.menu');
        if (menu) {
            const dropdown = menu.querySelector('.dropdown');
            if (dropdown) {
                dropdown.classList.toggle('hidden');
            }
        }
    }
});
document.addEventListener('DOMContentLoaded', () => {
    const machineButton = document.getElementById('machineDropdownButton');
    const goodsButton = document.getElementById('goodsDropdownButton');
    const machineDropdown = document.getElementById('dropdownMachineList');
    const goodsDropdown = document.getElementById('dropdownGoodsList');
    const statsDropdown = document.getElementById('dropdownStatsList');
    const statsButton = document.getElementById('statsDropdownButton');

    // Функция для скрытия всех dropdown
    function hideDropdowns() {
        machineDropdown.classList.add('hidden');
        goodsDropdown.classList.add('hidden');
        statsDropdown.classList.add('hidden');
    }

    // Переключение раскрытия для кнопок
    machineButton.addEventListener('click', (e) => {
        e.stopPropagation();
        hideDropdowns();
        machineDropdown.classList.toggle('hidden');
    });

    goodsButton.addEventListener('click', (e) => {
        e.stopPropagation();
        hideDropdowns();
        goodsDropdown.classList.toggle('hidden');
    });

    statsButton.addEventListener('click', (e) => {
        e.stopPropagation();
        hideDropdowns();
        statsDropdown.classList.toggle('hidden');
    });

    // Закрытие dropdown при клике вне области
    document.addEventListener('click', hideDropdowns);
});

// navListItems.forEach(e => {
//     console.log(e)
// })
