<div class="edit-product">
    <h1> Реадктирование товара</h1>

    <form class="edit-product-form" action="">
        <input type="hidden" name="id" value="{{$product->id}}">

            @if(!@fopen(asset('public/'.env('THEME')).'/img/' . $product->photo_maine.'.jpg', 'r'))
                <div class="img-prod">
                    <img class="img-prod-img" src="{{asset('public/'.env('THEME')).'/img/' . $product->photo_maine}}.jpg" alt="{{ $product->categories }}">
                    <span class="delete-form-foto">
                        <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                    </span>
                </div>
            @else
                <div class="foto">
                    <span class="delete-form-foto">
                         <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                     </span>
                </div>
            @endif

        @if(!@fopen(asset('public/'.env('THEME')).'/img/' . $product->photo1.'.jpg', 'r'))
            <div class="img-prod">
                <img class="img-prod-img" src="{{asset('public/'.env('THEME')).'/img/' . $product->photo1}}.jpg" alt="{{ $product->categories }}">
                <span class="delete-form-foto">
                        <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                    </span>
            </div>
        @else
            <div class="foto">
                    <span class="delete-form-foto">
                         <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                     </span>
            </div>
        @endif

        @if(!@fopen(asset('public/'.env('THEME')).'/img/' . $product->photo2.'.jpg', 'r'))
            <div class="img-prod">
                <img class="img-prod-img" src="{{asset('public/'.env('THEME')).'/img/' . $product->photo2}}.jpg" alt="{{ $product->categories }}">
                <span class="delete-form-foto">
                        <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                    </span>
            </div>
        @else
            <div class="foto">
                    <span class="delete-form-foto">
                         <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                     </span>
            </div>
        @endif

        @if(!@fopen(asset('public/'.env('THEME')).'/img/' . $product->photo3.'.jpg', 'r'))
            <div class="img-prod">
                <img class="img-prod-img" src="{{asset('public/'.env('THEME')).'/img/' . $product->photo3}}.jpg" alt="{{ $product->categories }}">
                <span class="delete-form-foto">
                        <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                    </span>
            </div>
        @else
            <div class="foto">
                    <span class="delete-form-foto">
                         <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                     </span>
            </div>
        @endif

        @if(!@fopen(asset('public/'.env('THEME')).'/img/' . $product->photo4.'.jpg', 'r'))
            <div class="img-prod">
                <img class="img-prod-img" src="{{asset('public/'.env('THEME')).'/img/' . $product->photo4}}.jpg" alt="{{ $product->categories }}">
                <span class="delete-form-foto">
                        <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                </span>
            </div>
        @else
            <div class="foto">
                    <span class="delete-form-foto">
                         <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="">
                     </span>
            </div>
        @endif



        </div>
        <div class="flex">
            <div class="left-form">
                <label for="form-id-product">
                    id_1c<br>
                    <input type="text" id="form-id-product" name="product_id" value="{{$product->product_id}}">
                </label>

                <label for="form-lable-product">
                    Производитель<br>
                    <input type="text" name="label" list="label" id="form-lable-product" value="{{$product->label}}">
                    @if($label)
                        <datalist id="label">
                            @foreach($label as $item)
                                <option value="{{ $item->label }}">{{ $item->label }}</option>
                            @endforeach
                        </datalist>
                    @endif
                </label>

                <label for="form-price_many-product">
                    Цена опт<br>
                    <input type="number" step="0.01" name="price_many" id="form-price_many-product" value="{{$product->price_many}}">
                </label>

                <label for="form-size-product">
                   Размер<br>
                    <input type="text" list="size" name="size" id="form-size-product" value="{{$product->size}}">
                    @if($size)
                        <datalist id="size">
                            @foreach($size as $item)
                                <option value="{{ $item->size }}">{{ $item->size }}</option>
                            @endforeach
                        </datalist>
                    @endif
                </label>

                <label for="form-count-product">
                    Количество<br>
                    <input type="number" name="count" id="form-country-product" value="{{$product->count}}">
                </label>

                <label for="form-end_sale-product">
                    Конец скидки<br>
                    <input type="text" name="end_sale" id="form-sale-product" value="{{$product->end_sale}}">
                </label>


                <label for="form-key-product">
                    Meta_keywords<br>
                    <input type="text" name="meta_key" id="form-key-product" value="{{$product->meta_key}}">
                </label>

            </div>
            <div class="right-form">
                <label for="form-code-product">
                    Штрих код<br>
                    <input type="text" name="code" id="form-code-product" value="{{$product->code}}">
                </label>
                <label for="form-label-product">
                    Марка товара<br>
                    <input type="text" name="label" id="form-label-product" value="{{$product->label}}">
                </label>
                <label for="form-price_one-product">
                    Цена розница<br>
                    <input type="text" name="price_one" id="form-price_one-product" value="{{$product->price_one}}">
                </label>
                <label for="form-sale_one-product">
                    Скидка от розницы<br>
                    <input type="text" name="sale_one" id="form-sale_one-product" value="{{$product->sale_one}}">
                </label>
                <label for="form-categories-product">
                    Категория<br>
                    <input type="text" name="categories" list="categories" id="form-categories-product" value="{{$product->categories}}">
                    @if($cat_prod)
                        <datalist id="categories">
                            @foreach($cat_prod as $item)
                                <option value="{{ $item->categories }}">{{ $item->categories }}</option>
                            @endforeach
                        </datalist>
                    @endif
                </label>



                <label for="form-title-product">
                    Meta_title<br>
                    <input type="text" name="meta_title" id="form-title-product" value="{{$product->meta_title}}">
                </label>
            </div>
            <div class="right-form">
                <label for="form-females-product">
                    Основная группа<br>
                    <input type="text" name="females" list="females" id="form-females-product" value="{{$product->categories}}">
                        <datalist id="females">
                                <option value="1">Мужская одежда</option>
                                <option value="2">Женская одежда</option>
                        </datalist>
                </label>

                <label for="form-new-product">
                    Новое<br>
                    <input type="text" name="new" list="new" id="form-new-product" value="{{$product->new}}">
                    <datalist id="new">
                        <option value="0">Да</option>
                        <option value="1">Нет</option>
                    </datalist>
                </label>

                <label for="form-country-made-product">
                    Страна производства<br>
                    <input type="text" name="country" list="country-made" id="form-country-made-product" value="{{$product->country}}">
                    @if($country)
                        <datalist id="country-made">
                            @foreach($country as $item)
                                <option value="{{ $item->country }}">{{ $item->country }}</option>
                            @endforeach
                        </datalist>
                    @endif
                </label>

                <label for="form-sale_many-product">
                    Скидка от опта<br>
                    <input type="text" name="sale_name" id="form-sale_many-product" value="{{$product->sale_many}}">
                </label>
                <label for="form-style-product">
                    Стиль<br>
                    <input type="text" name="style" list="style" id="form-style-product" value="{{$product->style}}">
                    @if($style)
                        <datalist id="style">
                            @foreach($style as $item)
                                <option value="{{ $item->style }}">{{ $item->style }}</option>
                            @endforeach
                        </datalist>
                    @endif
                </label>
                <label for="form-sesons-product">
                    Сезон<br>
                    <input type="text" name="sesons" list="sesons" id="form-sesons-product" value="{{$product->sesons}}">
                    @if($sesons)
                        <datalist id="sesons">
                            @foreach($sesons as $item)
                                <option value="{{ $item->sesons }}">{{ $item->sesons }}</option>
                            @endforeach
                        </datalist>
                    @endif
                </label>

                <label for="form-meta_desc-product">
                    meta_description<br>
                    <input type="text" name="meta_desc" id="form-meta_desc-product" value="{{$product->meta_desc}}">
                </label>
            </div>
        </div>
        <textarea name="desc" id="desc" placeholder="Описание товара" rows="10">{{$product->desc}}</textarea>
    </form>
    <div class="modal-box modal-edit-product">
        <span class="close">&times;</span>
        <div class="order-contents order-modal";
            <div class="content content-edit-product">
                <div class="flex">
                    <h2>
                        Выберите фото
                    </h2>
                    <input type="text" placeholder="Поиск..." class="search-admin-edit search-admin search-img">
                </div>
                @if($images)
                    <div class="wrapper wrapper-admin">
                        <div class="blocks-admin flex">
                            @foreach($images as $image)
                                @if($image != '.' && $image != '..')
                                    <div class="block-admin flex img-for-product" title="{{str_replace('.jpg','',$image)}}">
                                        <div class=" img-tovar-admin ">
                                            <img src="{{asset('public/'.env('THEME')) . '/img/catalog/'.  $image }}" alt="{{$image}}">
                                        </div>
                                        <p class="brand">{{ $image }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>