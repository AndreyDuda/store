<div class="flex column">
    <div class="edit-product">
        <h1> Реадктирование товара</h1>

        <div class="all-foto flex">
            @if(in_array(str_replace('catalog/', '' ,$product->photo_maine.'.jpg' ), $images ))
                <div class="foto photo_maine" data-photo="photo_maine">
                    <p class="foto-text">Основное фото</p>
                    <img class="ch" src="{{asset('storejeans').'/img/' . $product->photo_maine.'.jpg'}}" alt="">
                    <span class="change-image">
                            <img src="{{ asset(env('THEME'))}}/img/system/delete.png" alt="">
                        </span>
                </div>
            @else
                <div class="foto change_photo photo_maine" data-photo="photo_maine">
                    <p class="foto-text">Основное фото</p>
                    <img class="ch" src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="">
                    <span class="change-image" style="display:none">
                            <img src="{{ asset(env('THEME'))}}/img/system/delete.png" alt="">
                        </span>
                </div>
            @endif

            @if(in_array(str_replace('catalog/', '' ,$product->photo1.'.jpg' ), $images ))
                <div class="foto photo1" data-photo="photo1">
                    <p class="foto-text">Фото-1</p>
                    <img class="ch" src="{{asset('storejeans').'/img/' . $product->photo1.'.jpg'}}" alt="">
                    <span class="change-image">
                            <img src="{{ asset(env('THEME'))}}/img/system/delete.png" alt="">
                        </span>
                </div>
            @else
                <div class="foto change_photo photo1" data-photo="photo1">
                    <p class="foto-text">Фото-1</p>
                    <img class="ch" src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="">
                    <span class="change-image" style="display:none">
                            <img src="{{ asset(env('THEME'))}}/img/system/delete.png" alt="">
                        </span>
                </div>

            @endif

            @if(in_array(str_replace('catalog/', '' ,$product->photo2.'.jpg' ), $images ))
                <div class="foto photo2" data-photo="photo2">
                    <p class="foto-text">Фото-2</p>
                    <img class="ch" src="{{asset('storejeans').'/img/' . $product->photo2.'.jpg'}}" alt="">
                    <span class="change-image">
                            <img src="{{ asset(env('THEME'))}}/img/system/delete.png" alt="">
                        </span>
                </div>
            @else
                <div class="foto change_photo photo2" data-photo="photo2">
                    <p class="foto-text">Фото-2</p>
                    <img class="ch" src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="">
                    <span class="change-image" style="display:none">
                            <img src="{{ asset(env('THEME'))}}/img/system/delete.png" alt="">
                        </span>
                </div>

            @endif

                @if(in_array(str_replace('catalog/', '' ,$product->photo3.'.jpg' ), $images ))
                <div class="foto  photo3" data-photo="photo3">
                    <p class="foto-text">Фото-3</p>
                    <img class="ch" src="{{asset('storejeans').'/img/' . $product->photo3.'.jpg'}}" alt="">
                    <span class="change-image">
                            <img src="{{ asset(env('THEME'))}}/img/system/delete.png" alt="">
                         </span>
                </div>
            @else
                <div class="foto change_photo photo3" data-photo="photo3">
                    <p class="foto-text">Фото-3</p>
                    <img class="ch" src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="">
                    <span class="change-image" style="display:none">
                            <img src="{{ asset(env('THEME'))}}/img/system/delete.png" alt="">
                        </span>
                </div>

            @endif

                @if(in_array(str_replace('catalog/', '' ,$product->photo4.'.jpg' ), $images ))
                <div class="foto photo4" data-photo="photo4">
                    <p class="foto-text">Фото-4</p>
                    <img class="ch" src="{{asset('storejeans').'/img/' . $product->photo4.'.jpg'}}" alt="">
                    <span class="change-image">
                             <img src="{{ asset(env('THEME'))}}/img/system/delete.png" alt="">
                        </span>
                </div>
            @else
                <div class="foto change_photo photo4" data-photo="photo4">
                    <p class="foto-text">Фото-4</p>
                    <img class="ch" src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="">
                    <span class="change-image" style="display:none">
                            <img src="{{ asset(env('THEME'))}}/img/system/delete.png" alt="">
                        </span>
                </div>

            @endif


        </div>
        <form action="{{ route('updateProduct') }}" method="post">
            {{ csrf_field() }}
            <div class="flex flex-start width100">
                <div class="left-form">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" id="no_image" value="{{ asset(env('THEME'))}}/img/system/no-image.png">
                    <input type="hidden" id="for_change" value="">
                    <input type="hidden" id="photo_maine" name="photo_maine" value="{{ $product->photo_maine OR '' }}">
                    <input type="hidden" id="photo1" name="photo1" value="{{ $product->photo1 OR '' }}">
                    <input type="hidden" id="photo2" name="photo2" value="{{ $product->photo2 OR '' }}">
                    <input type="hidden" id="photo3" name="photo3" value="{{ $product->photo3 OR '' }}">
                    <input type="hidden" id="photo4" name="photo4" value="{{ $product->photo4 OR '' }}">
                    <label for="form-id-product">
                        id_1c<br>
                        <input type="text" id="form-id-product" name="product_id" value="{{$product->product_id}}">
                    </label>

                    <label for="form-lable-product">
                        Производитель<br>
                        <input type="text" name="label" list="label" id="form-lable-product"
                               value="{{$product->label}}">
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
                        <input type="number" step="0.01" name="price_many" id="form-price_many-product"
                               value="{{$product->price_many}}">
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
                        <input type="text" name="categories" list="categories" id="form-categories-product"
                               value="{{$product->categories}}">
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
                        <input type="text" name="females" list="females" id="form-females-product"
                               value="{{$product->categories}}">
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
                        <input type="text" name="country" list="country-made" id="form-country-made-product"
                               value="{{$product->country}}">
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
                        <input type="text" name="style" list="style" id="form-style-product"
                               value="{{$product->style}}">
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
                        <input type="text" name="sesons" list="sesons" id="form-sesons-product"
                               value="{{$product->sesons}}">
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
                <textarea class="area-edit" name="desc" id="desc" rows="10"
                          placeholder="Описание товара">{{trim($product->desc)}}</textarea>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-success main-bg-color">
                        Добавить товар
                    </button>
                </div>
            </div>

        </form>
    </div>
    <div class="modal-box modal-edit-product">
        <span class="close">&times;</span>
        <div class="order-contents order-modal" ;
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
                                        <img data-img="{{$image}}"
                                             src="{{asset('storejeans') . '/img/catalog/'.  $image }}" alt="{{$image}}">
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
