const addBtn = document.querySelector('.add-btn');
const modal = document.querySelector('.modal');
const closeBtn = document.querySelector('.close');
const overlay = document.querySelector('.overlay');
try{
    addBtn.addEventListener('click', () => {
        modal.showModal()
    })
    closeBtn.addEventListener('click',() => {
        modal.close()
    })
    overlay.addEventListener('click', () => {
        modal.close()
    })
    console.log(addBtn)
}catch (e){
    console.log(e)
}

