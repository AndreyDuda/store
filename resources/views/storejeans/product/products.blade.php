<div class="wrapper">
    @if($slider_p)
        <div class="slider-catalog">
            <div class="title-carousel">
                <p>Выгодные предложения</p>
            </div>
            <div class="slider-catalog">
                <div class="multiple-item">
                    @foreach($slider_p as $product)
                        <div class="item">
                            <a href="{{ route('productOne', ['id' => $product->product_id ] )  }}" class="item-tovar">
                                <div class="img-tovar">
                                    @if(file_exists( asset(env('THEME') . '/img/' . $product->photo  . '.jpg')))
                                        <img src="{{ asset(env('THEME'))}}/img/{{ $product->photo }}.jpg" alt="">
                                    @else
                                        <img src="{{ asset(env('THEME'))}}/img/catalog/no-image.png" alt="">
                                    @endif
                                </div>
                                <div class="brand">{{ $product->label }}</div>
                                <div class="description">{{ $product->title }}</div>
                                <div class="price">{{$product->price_many}}<i class="fa fa-usd" aria-hidden="true"></i></div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <aside>
        <div class="stock">
            <ul>
                <li {{($category == 'bestoffer')? 'class=category-list-active':''}}><a href="{{ route('productAll', ['catedories' => 'bestoffer']) }}">Выгодные предложения</a></li>
                <li {{($category == 'sale')? 'class=category-list-active':''}}><a href="{{ route('productAll', ['catedories' => 'sale']) }}">Распродажа</a></li>
                <li {{($category == 'new')? 'class=category-list-active':''}}><a href="{{ route('productAll', ['catedories' => 'new']) }}">Новинки</a></li>
            </ul>
        </div>
        <div class="category-list">
            <ul>
                <li {{($category == 'male')? 'class=category-list-active':''}}>
                    <a href="{{ route('productAll', ['catedories' => 'male']) }}">Мужская одежда</a>
                </li>
                <li {{($category == 'female')? 'class=category-list-active':''}}>
                    <a href="{{ route('productAll', ['catedories' => 'female']) }}">Женская одежда</a>
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
                <a href="{{ route('productAll') }}"><p>Очистить все фильтра</p></a>
            </div>
            <form method="get" >
               {{-- {{ csrf_field() }}--}}
                <dt class="filter-header">
                    Сезон
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </dt>
                <dd class="filter-body ">
                    <ul>@foreach($sesons as $k=>$item)
                            <li>
                                <input <?= (array_key_exists('sesons', $input) && array_search($item->sesons, $input['sesons']) !== FALSE )? 'checked="checked"':''?> data-name="{{$item->sesons}}" type="checkbox" class="checkbox" id="sesons{{$k}}" name="sesons[]" value="{{$item->sesons}}"/>
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
                                <input <?= (array_key_exists('size', $input) && array_search($item->size, $input['size']) !== FALSE )? 'checked="checked"':''?> data-name="{{$item->size}}" type="checkbox" class="checkbox" id="size{{$k}}" name="size[]" value="{{$item->size}}"/>
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
                                <input <?= (array_key_exists('style', $input) && array_search($item->style, $input['style']) !== FALSE )? 'checked="checked"':''?> data-name="{{$item->style}}" type="checkbox" class="checkbox" id="style{{ $k }}" name="style[]" value="{{$item->style}}"/>
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
                                <input <?= (array_key_exists('country', $input) && array_search($item->country, $input['country']) !== FALSE )? 'checked="checked"':''?> data-name="{{$item->country}}" type="checkbox" class="checkbox" id="country{{ $k }}" name="country[]" value="{{$item->country}}"/>
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
                                <input <?= (array_key_exists('label', $input) && array_search($item->label, $input['label']) !== FALSE )? 'checked="checked"':''?> data-name="{{$item->label}}"  type="checkbox" class="checkbox" id="lable{{$k}}" name="label[]" value="{{$item->label}}"/>
                                <label for="lable{{$k}}">{{ $item->label }}</label>
                            </li>
                        @endforeach
                    </ul>

                </dd>
                <input type="hidden" name="page" value="1" id="page">
                <input type="hidden" name="sort" value="1" id="sort">
                <button type="submit" id="send" class="clear-filters-submit">
                    <p>Применить фильтр</p>
                </button>
            </form>
        </dl>
    </aside>

    <div class="content">
        <ol id="breadcrumb">
            <li>
                <a href="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i>
                    <span class="sr-only">Главная</span></a>
            </li>
            <li>
                <a href="{{ route('productAll', ['catedories' => 'all']) }}">Каталог</a>
            </li>
            @if($name_cat)
            <li class="current">
                 <a href="{{ route('productAll', ['catedories' => $category]) }}">{{$name_cat}}</a>
            </li>
            @endif

        </ol>
        <div class="filter-button">
            Фильтры
        </div>
        <div class="clear"></div>
        <div class="category-name">
            <p>{{ $name_cat }}</p>
        </div>

        @if($cat_prod)
        <div class="new-category">
            @foreach($cat_prod as $category)
           <div class="new-category-item">
                <p>{{$category->categories}}</p>
               <s href="{{ route('productAll', ['catedories' => $category->categories]) }}"> <img src="{{ asset(env('THEME'))}}/img/category-item.jpg" alt=""></s>
           </div>
            @endforeach
        </div>
        @endif


        <form action="#">
            <div class="select">
                <p>
                    Сортиртировка товаров:
                </p>
                <select name="sort" class="sort">
                    @if($order > 0)
                        @if($order == 1)
                            <option value="1">По возрастанию цены</option>
                            <option value="0">Не сортировать</option>
                            <option value="2">Пл убыванию цены</option>
                        @else
                            <option value="2">Убыванию цены</option>
                            <option value="0">Не сортировать</option>
                            <option value="1">Возрастанию цены</option>
                        @endif
                    @else
                    <option value="0">Не сортировать</option>
                    <option value="1">По возрастанию цены</option>
                    <option value="2">по убыванию цены</option>
                    @endif
                </select>
            </div>
        </form>

<?= file_exists( asset(env('THEME') . '/img/tovarl.jpg')) ?>
@if($products)
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
@endif

    </div>
</div>
{{--<div class="yet-tovar">
    <h5>Показать ещё 18 товаров</h5>
</div>--}}
@if($products)
<div class="navigation">
    <?

        $count_product = $products->lastPage();
    ?>
    @if($count_product > 1)
        <ul>
        @if($products->currentPage() != 1)
                <span class="page">1<i class="fa fa-arrow-left" aria-hidden="true"></i></span>
        @endif

        @for($i = 1; $i <= $count_product; $i++)
            @if($products->currentPage() > $i && $products->currentPage()-$i < $step && $products->currentPage() != $count_product - 1)
                     <li class="page">{{ $i }}</li>
            @elseif($products->currentPage() == $i)
                     <li class="current page">{{ $i }}</li>
            @elseif($products->currentPage() < $i && $i - $products->currentPage() < $step && $products->currentPage() != $count_product - 1)
                    <li class="page">{{ $i }}</li>
            @endif
        @endfor
        {{--<li class="not-hover"> ... </li>--}}
            @if($products->currentPage() != $count_product)
               <span><i class="fa fa-arrow-right page" aria-hidden="true">{{$count_product}}</i></span>
            @endif
    </ul>
    @endif
</div>
@endif

@if($slider_p)
<div class="slider-catalog">
    <div class="title-carousel">
        <p>Выгодные предложения</p>
    </div>
    <div class="slider-catalog">
        <div class="multiple-item">
            @foreach($slider_p as $product)
            <div class="item">
                <a href="{{ route('productOne', ['id' => $product->product_id ] )  }}" class="item-tovar">
                    <div class="img-tovar">
                        @if(file_exists( asset(env('THEME') . '/img/' . $product->photo  . '.jpg')))
                            <img src="{{ asset(env('THEME'))}}/img/{{ $product->photo }}.jpg" alt="">
                        @else
                            <img src="{{ asset(env('THEME'))}}/img/catalog/no-image.png" alt="">
                        @endif
                    </div>
                    <div class="brand">{{ $product->label }}</div>
                    <div class="description">{{ $product->title }}</div>
                    <div class="price">{{$product->price_many}}<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
</div>
