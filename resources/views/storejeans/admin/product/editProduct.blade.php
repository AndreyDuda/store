<div class="edit-product">
    <h1> Реадктирование товара</h1>

    <form class="edit-product-form" action="">
        <div class="fotos">
            <div class="foto">
                <span class="delete-form-foto">
                    <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                </span>
            </div>
            <div class="foto">
                <span class="delete-form-foto">
                    <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                </span>
            </div><div class="foto">
                <span class="delete-form-foto">
                    <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                </span>
            </div><div class="foto">
                <span class="delete-form-foto">
                    <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                </span>
            </div>
        </div>
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
    <div class="modal-box modal-edit-product">
        <span class="close">&times;</span>
        <div class="order-contents order-modal";
            <div class="content content-edit-product">
                <div class="flex">
                    <h2>
                        Выберите фото
                    </h2>
                    <input type="text" placeholder="Поиск..." class="search-admin-edit search-admin">
                </div>
                @if($images)
                    <div class="wrapper wrapper-admin">
                        <div class="blocks-admin flex">
                            @for($i=0;$i<10; $i++)
                                @foreach($images as $image)
                                    @if($image != '.' && $image != '..')
                                        <div class="block-admin flex block-admin-edit">
                                            <div class=" img-tovar-admin ">
                                                <img src="{{asset('public/'.env('THEME')) . '/img/catalog/'.  $image }}" alt="">
                                            </div>
                                            <p class="brand">{{ $image }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            @endfor
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>