const sold = document.querySelectorAll('.sold')
let sum = 0
const soldTotal = document.querySelector('.sold-total')

window.addEventListener('DOMContentLoaded', () => {
    sold.forEach(e =>
        {
            sum += Number(e.textContent)
        }
    )

    soldTotal.textContent = sum

})
