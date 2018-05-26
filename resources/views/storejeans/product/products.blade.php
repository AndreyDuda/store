<div class="wrapper">



    <div class="slider-catalog">
        <div class="multiple-item">
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
        </div>
    </div>





    <aside>
        <div class="stock">
            <ul>
                <li><a href="#">Выгодные предложения</a></li>
                <li><a href="#">Распродажа</a></li>
                <li><a href="#">Новинки</a></li>
            </ul>
        </div>
        <div class="category-list">
            <ul>
                <li>
                    <a href="#">Мужская одежда</a>
                </li>
                <li>
                    <a href="#">Женская одежда</a>
                </li>
            </ul>
            <div class="stock2">
                <ul>
                    <li><a href="#">Распродажа</a></li>
                    <li><a href="#">Новинки</a></li>
                </ul>
            </div>
        </div>
        <dl class="filters">
            <div class="clear-filters">
                <p>Очистить все фильтра</p>
            </div>
            <form method="post" >
                {{ csrf_field() }}
                <dt class="filter-header">
                    Сезон
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </dt>
                <dd class="filter-body ">
                    <ul>@foreach($sesons as $k=>$item)
                            <li>
                                <input type="checkbox" class="checkbox" id="sesons{{$k}}" name="sesons[]" value="{{$item->sesons}}"/>
                                <label for="sesons{{$k}}">{{ $item->sesons }}</label>
                            </li>
                        @endforeach
                    </ul>
                </dd>
                <dt class="filter-header">
                    Размеры
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </dt>
                <dd class="filter-body ">
                    <ul>
                        @foreach($size as $k=>$item)
                            <li>
                                <input type="checkbox" class="checkbox" id="size{{$k}}" name="size[]" value="{{$item->size}}"/>
                                <label for="size{{$k}}">{{ $item->size }}</label>
                            </li>
                        @endforeach
                    </ul>
                </dd>
                <dt class="filter-header">
                    Стиль
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </dt>
                <dd class="filter-body ">
                    <ul>
                        @foreach($style as $k=>$item)
                            <li>
                                <input type="checkbox" class="checkbox" id="style{{ $k }}" name="style[]" value="{{$item->style}}"/>
                                <label for="style{{ $k }}">{{ $item->style }}</label>
                            </li>
                        @endforeach

                    </ul>
                </dd>
                <dt class="filter-header">
                    Страна
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </dt>
                <dd class="filter-body ">
                    <ul>
                        @foreach($country as $k=>$item)
                            <li>
                                <input type="checkbox" class="checkbox" id="country{{ $k }}" name="country[]" value="{{$item->country}}"/>
                                <label for="country{{ $k }}">{{ $item->country }}</label>
                            </li>
                        @endforeach

                    </ul>
                </dd>
                <dt class="filter-header">
                    Фирма
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </dt>
                <dd class="filter-body ">
                    <ul>
                        @foreach($lable as $k=>$item)
                            <li>
                                <input type="checkbox" class="checkbox" id="lable{{$k}}" name="label[]" value="{{$item->label}}"/>
                                <label for="lable{{$k}}">{{ $item->label }}</label>
                            </li>
                        @endforeach
                    </ul>

                </dd>
                <button type="submit" class="clear-filters-submit">
                    <p>Применить фильтр</p>
                </button>
                {{--<button></button>--}}
            </form>
        </dl>
    </aside>

    <div class="content">
        <ol id="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-home" aria-hidden="true"></i>
                    <span class="sr-only">Главная</span></a>
            </li>
            <li>
                <a href="#">Каталог</a>
            </li>
            <li class="current">
                <a href="#">Мужские джинсы</a>
            </li>
        </ol>
        <div class="filter-button">
            Фильтры
        </div>
        <div class="clear"></div>
        <div class="category-name">
            <p>Мужские джинсы</p>
        </div>

        <div class="new-category">
            <div class="new-category-item">
                <p>Футболки мужские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Свитера мужские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Батники мужские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Куртки мужские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Ремни мужские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Джинсы женские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Шорты женские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Шорты женские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Жилетки женские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Футболки женские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Куртки женские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
            <div class="new-category-item">
                <p>Шорты женские</p>
                <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt="">
            </div>
        </div>


        <form action="#">
            <div class="select">
                <p>
                    Сортиртировка товаров:
                </p>
                <select name="sort">
                    <option value="1">По дате добавления</option>
                    <option value="2">По возрастанию цены</option>
                    <option value="3">По убыванию цены</option>
                </select>
            </div>
        </form>

<?= file_exists( asset(env('THEME') . '/img/tovarl.jpg')) ?>
        <div class="wrapper">
@foreach($products as $product)
            <a href="{{ route('productOne', ['id' => $product->product_id ] )  }}" class="item-tovar">
                <div class="img-tovar">
                    @if(file_exists( asset(env('THEME') . '/img/' . $product->photo  . '.jpg')))
                        <img src="{{ asset(env('THEME'))}}/img/{{ $product->photo }}.jpg" alt="">
                    @else
                        <img src="{{ asset(env('THEME'))}}/img/catalog/no-image.png" alt="">
                    @endif
                </div>
                <div class="brand">{{ $product->label }}</div>
                <div class="description">{{ $product->desc }}</div>
                <div class="price">{{ $product->price_many }}<i class="fa fa-usd" aria-hidden="true"></i></div>
            </a>
@endforeach
        </div>


    </div>
</div>
{{--<div class="yet-tovar">
    <h5>Показать ещё 18 товаров</h5>
</div>--}}
<div class="navigation">
    <?
        $count_product = $products->lastPage();
    ?>
    @if($count_product > 1)
        <ul>
        @if($products->currentPage() != 1)
                <a href="{{ $products->url(1) }}"><span><i class="fa fa-arrow-left" aria-hidden="true"></i></span></a>
        @endif

        @for($i = 1; $i <= $count_product; $i++)
            @if($products->currentPage() > $i && $products->currentPage()-$i < $step && $products->currentPage() != $count_product - 1)
                    <a href="{{ $products->url($i) }}" ><li>{{ $i }}</li></a>
            @elseif($products->currentPage() == $i)
                    <li class="current">{{ $i }}</li>
            @elseif($products->currentPage() < $i && $i - $products->currentPage() < $step && $products->currentPage() != $count_product - 1)
                    <a href="{{ $products->url($i) }}" > <li>{{ $i }}</li></a>
            @endif
        @endfor
        {{--<li class="not-hover"> ... </li>--}}
            @if($products->currentPage() != $count_product)
                <a href="{{ $products->url($count_product - 1 ) }}"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
            @endif
    </ul>
    @endif
</div>


<div class="slider-catalog">
    <div class="title-carousel">
        <p>Выгодные предложения</p>
    </div>


    <div class="slider-catalog">
        <div class="multiple-item">
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            <div class="item">
                <a href="product.php" class="item-tovar">
                    <div class="img-tovar">
                        <img src="{{ asset(env('THEME'))}}/img/tovar2.jpg" alt="">
                    </div>
                    <div class="brand">Franco Marela</div>
                    <div class="description">7022 Franko Marela (30-38, 8 ед.) джинсы мужские демисезонные стрейч</div>
                    <div class="price">8.00<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
        </div>
    </div>









</div>
</div>
