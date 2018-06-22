{{ csrf_field() }}
<div class="edit-product">
    <h1> Реадктирование товара</h1>

    <form action="" enctype="multipart/form-data" method="POST">
        <div class="fotos">
            <label for="">
                <span class="delete-form-foto">
                    <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                </span>
                <input type="file" class="imageProduct" id="image1" name="image[]" >
            </label>
            <label for="">
                <span class="delete-form-foto">
                    <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                </span>
                <input type="file" class="imageProduct" id="image2" name="image[]" >
            </label>
            <label for="">
                <span class="delete-form-foto">
                    <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                </span>
                <input type="file" class="imageProduct" id="image3" name="image[]" >
            </label>
            <label for="">
                <span class="delete-form-foto">
                    <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                </span>
                <input type="file" class="imageProduct" id="image4" name="image[]" >
            </label>
        </div>
    </form>

    <form>
        <div class="flex">
            <div class="left-form">
                <label for="form-name-product">
                    Название товара<br>
                    <input type="text" id="form-name-product">
                </label>
                <label for="form-label-product">
                    Марка товара<br>
                    <input type="text" id="form-label-product">
                </label>
                <label for="form-country-product">
                    Страна производства<br>
                    <input type="text" id="form-country-product">
                </label>
                Наличие
                <select name="availability" id="">
                    <option value="true">Да</option>
                    <option value="false">Нет</option>
                </select>
                <label for="form-keywords-product">
                    Ключевые слова<br>
                    <input type="text" id="form-keywords-product">
                </label>
            </div>
            <div class="right-form">
                <label for="form-price-product">
                    Цена<br>
                    <input type="text" id="form-price-product">
                </label>
                <label for="form-code-product">
                    Цена<br>
                    <input type="text" id="form-code-product">
                </label>
                <label for="form-1c-product">
                    Код 1С<br>
                    <input type="text" id="form-1c-product">
                </label>
                <label for="form-discount-product">
                    Скидка<br>
                    <input type="text" id="form-discount-product">
                </label>
                <label for="form-date-discount-product">
                    Скидка<br>
                    <input type="text" id="form-date-discount-product">
                </label>
            </div>
        </div>
        <textarea name="" id=""  rows="10">Описание товара</textarea>
    </form>
</div>