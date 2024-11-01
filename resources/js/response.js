let currentPage = 1; // Текущая страница
const perPage = 10; // Количество элементов на странице
const prev = document.querySelector('.prev')
const next = document.querySelector('.next')

const fetchData = (page) => {
    fetch(`http://127.0.0.1:8000/debug/automat?per_page=${perPage}&page=${page}`)
        .then(response => response.json())
        .then(data => {
            renderData(data.data); // Отрисовка данных
            renderPagination(data); // Отрисовка элементов управления пагинацией
        })
        .catch(error => console.error('Fetch error:', error));
};

const renderData = (events) => {
    const outputElement = document.querySelector('#output');
    outputElement.innerHTML = ''; // Очистка предыдущих данных

    events.forEach(event => {
        const string = `<div class="border"> <h2>${event.id}</h2><ul>    <li>${new Date(event.dateTime).toDateString()}</li>    <li>${event.type}</li>    <li>${event.message}</li></ul></div>`;
        outputElement.innerHTML += string;
    });
};

// const renderPagination = (data) => {
//     // const paginationElement = document.querySelector('#pagination');
//     // paginationElement.innerHTML = ''; // Очистка предыдущей пагинации
//
//     // Создаем элементы для управления пагинацией
//     for (let page = 1; page <= data.last_page; page++) {
//         const button = document.createElement('button');
//         button.innerText = page;
//         button.disabled = (page === currentPage); // Деактивируем текущую страницу
//         button.addEventListener('click', () => {
//             currentPage = page; // Обновляем текущую страницу
//             fetchData(currentPage); // Запрашиваем новые данные
//         });
//             // paginationElement.appendChild(button);
//     }
// };


prev.addEventListener('click', () => {
    console.log(currentPage)
    prev.disabled = currentPage <= 1;

    currentPage--
    fetchData(currentPage);
})

next.addEventListener('click', () => {
    prev.disabled = currentPage <= 1;

    currentPage++
    fetchData(currentPage);
})

// Вызов функции для первой загрузки данных
fetchData(currentPage);
