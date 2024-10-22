<div class="container requisites-container w-4/5 mx-auto my-0">
    <h1 class="pb-4 text-2xl">Редактирование реквизитов организации</h1>
    <hr class="pb-4">
    <p class="pb-4">Здесь вы можете изменить реквизиты</p>
    <div class="requisites">
        <form action="#" class="form form-horizontal form-requisites flex flex-col gap-4">
            <div class="form-group flex-group flex flex-col">
                <label for="paymentAccount" class="requisites-label">Номер расч. счёта</label>
                <input type="text" id="paymentAccount" placeholder="Номер расчетного счета" name="paymentAccount" value="" class="form-control requisites-control border px-4 py-2" required>
            </div>
            <div class="form-group flex-group flex flex-col">
                <label for="correspondingAccount" class="requisites-label">Номер корр. счёта</label>
                <input type="text" id="correspondingAccount" placeholder="Номер корреспондентского счета" name="correspondingAccount" value="" class="form-control requisites-control border px-4 py-2" required>
            </div>
            <div class="form-group flex-group flex flex-col">
                <label for="BIK" class="requisites-label">Введите БИК</label>
                <input type="text" id="BIK" placeholder="Банковский идентификационный код" name="BIK" value="" class="form-control requisites-control border px-4 py-2" required>
            </div>
            <div class="form-group flex-group flex flex-col">
                <label for="bankName" class="requisites-label">Наименование банка</label>
                <input type="text" id="bankName" placeholder="Полное наименование банка" name="bankName" value="" class="form-control requisites-control border px-4 py-2" required>
            </div>
            <div class="form-group flex-group flex flex-col">
                <label for="INN" class="requisites-label">Введите свой ИНН</label>
                <input type="text" id="INN" placeholder="ИНН" name="INN" value="" class="form-control requisites-control border px-4 py-2" required>
            </div>

            <div class="form-group">
                <button class="px-4 py-2 bg-[#337ab7] text-white rounded" type="submit">Отправить реквизиты</button>
            </div>
        </form>
    </div>
</div>

