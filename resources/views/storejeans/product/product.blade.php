{{ csrf_field() }}
<input type="hidden" id="url" value="{{asset('storejeans/img').'/' }}">
<ol id="breadcrumb" class="breadcrumb-product">
    <li>
        <a href="{{ route('productAll') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="sr-only">Главная</span>
        </a>
    </li>
    <li>
        <a href="{{ route('productAll') }}">Каталог</a>
    </li>
    <li class="current">
        <a href="{{ route('productAll', ['catedories' => $product->categories]) }}">{{ $product->categories }}</a>
    </li>
    <li class="current long-text">
        <a href="{{ route('productOne', ['id' => $product->id ] )  }}">{{ $product->title }}</a>
    </li>
</ol>
<div class="clear"></div>
<div class="wrapper flex-between">
    <div class="product-foto">
        <div class="slider-product-nav">
            @if(in_array(str_replace('catalog/', '' ,$product->photo_maine.'.jpg' ), $images ))
                <div class="slider-nav_item"><img src="{{asset(env('THEME')).'/img/'. $product->photo_maine}}.jpg" alt="{{ $product->categories }}"></div>
            @else
                <div class="slider-nav_item"><img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}"></div>
            @endif

                @if(in_array(str_replace('catalog/', '' ,$product->photo1.'.jpg' ), $images ))
                    <div class="slider-nav_item"><img src="{{asset(env('THEME')).'/img/'. $product->photo1}}.jpg" alt="{{ $product->categories }}"></div>
                @else
                    <div class="slider-nav_item"><img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}"></div>
                @endif

                @if(in_array(str_replace('catalog/', '' ,$product->photo2.'.jpg' ), $images ))
                    <div class="slider-nav_item"><img src="{{asset(env('THEME')).'/img/'. $product->photo2}}.jpg" alt="{{ $product->categories }}"></div>
                @else
                    <div class="slider-nav_item"><img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}"></div>
                @endif

                @if(in_array(str_replace('catalog/', '' ,$product->photo3.'.jpg' ), $images ))
                    <div class="slider-nav_item"><img src="{{asset(env('THEME')).'/img/'. $product->photo3}}.jpg" alt="{{ $product->categories }}"></div>
                @else
                    <div class="slider-nav_item"><img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}"></div>
                @endif

                @if(in_array(str_replace('catalog/', '' ,$product->photo4.'.jpg' ), $images ))
                    <div class="slider-nav_item "><img src="{{asset(env('THEME')).'/img/'. $product->photo4}}.jpg" alt="{{ $product->categories }}"></div>
                @else
                    <div class="slider-nav_item "><img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}"></div>
                @endif
        </div>

        <div class="slider-product">
            @if(in_array(str_replace('catalog/', '' ,$product->photo_maine.'.jpg' ), $images ))
                <div  class="slider_item"><img src="{{asset(env('THEME')).'/img/'. $product->photo_maine}}.jpg" alt="{{ $product->categories }}"></div>
            @else
                <div  class="slider_item"><img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}"></div>
            @endif

                @if(in_array(str_replace('catalog/', '' ,$product->photo1.'.jpg' ), $images ))
                    <div  class="slider_item"><img src="{{asset(env('THEME')).'/img/'. $product->photo1}}.jpg" alt="{{ $product->categories }}"></div>
                @else
                    <div  class="slider_item"><img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}"></div>
                @endif

                @if(in_array(str_replace('catalog/', '' ,$product->photo2.'.jpg' ), $images ))
                    <div  class="slider_item"><img src="{{asset(env('THEME')).'/img/'. $product->photo2}}.jpg" alt="{{ $product->categories }}"></div>
                @else
                    <div  class="slider_item"><img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}"></div>
                @endif

                @if(in_array(str_replace('catalog/', '' ,$product->photo3.'.jpg' ), $images ))
                    <div  class="slider_item"><img src="{{asset(env('THEME')).'/img/'. $product->photo3}}.jpg" alt="{{ $product->categories }}"></div>
                @else
                    <div  class="slider_item"><img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}"></div>
                @endif

                @if(in_array(str_replace('catalog/', '' ,$product->photo4.'.jpg' ), $images ))
                    <div  class="slider_item"><img src="{{asset(env('THEME')).'/img/'. $product->photo4}}.jpg" alt="{{ $product->categories }}"></div>
                @else
                    <div  class="slider_item"><img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}"></div>
                @endif
        </div>
    </div><!--product-foto-->
    <div class="product-info">
        <div class="wrap">
            <div class="product-name">
                <h2> {{ $product->title }}
                </h2>
                <div class="product-barcode">
                    код товара: <span> {{ $product->code }} </span>
                </div>
            </div>
            <div class="product-price">
                <p>{{ $product->price_many * $product->count_in_pack }} <span><i class="fa fa-usd" aria-hidden="true"></i></span></p>
                <div class="isset"> Цена за 1 уп.</div>
            </div>
            <div class="product-price">
                <p>{{ $product->price_many }} <span><i class="fa fa-usd" aria-hidden="true"></i></span></p>
                <div class="isset"> Цена за 1 шт.</div>

            </div>
        </div>
        <hr>
        <div class="wrap">
            <div class="product-filters">
                <h4>Характеристики</h4>
                <table class="table-filters" cellspacing="7">
                    <tr>
                        <td>Сезон</td>
                        <td>
                            <a href="{{ route('productAll', ['catedories' => $product->sesons]) }}" class="filter-link">{{ $product->sesons }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Размер</td>
                        <td>
                            <a href="#"  onclick="return false;" class="filter-link">{{ $product->size }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Стиль</td>
                        <td>
                            <a href="{{ route('productAll', ['catedories' => $product->style]) }}" class="filter-link">{{ $product->style }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Страна</td>
                        <td>
                            <a href="{{ route('productAll', ['catedories' => $product->country]) }}" class="filter-link">{{ $product->country }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Фирма</td>
                        <td>
                            <a href="{{ route('productAll', ['catedories' => $product->label]) }}" class="filter-link">{{ $product->label }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Упаковка</td>
                        <td>
                            <a href="#" onclick="return false;" class="filter-link">{{ $product->count_in_pack }} шт.</a>
                        </td>
                    </tr>
                    <tr>
                        <td>В наличии</td>
                        <td>
                            <div class="isset"> {{ ($product->count > 0)? 'В наличии' : 'Нет в наличии' }} </div>
                        </td>
                    </tr>


                </table>
            </div>


            <div class="product-data">
                <div class="wrap">
                    <div id="myModal" class="modal">
                        <div class="modal-text">
                            <h3>Таблица размеров</h3>
                            <span class="close">&times;</span>
                            <input type="radio" name="tab" id="tab-1" checked>
                            <label for="tab-1">Женские</label>
                            <input type="radio" name="tab" id="tab-2">
                            <label for="tab-2">Мужские</label>
                            <div class="ruler-content">
                                <article class="tab-1">
                                    <table>
                                        <tr>
                                            <th>МИР</th>
                                            <th>ДЖИНС</th>
                                            <th>БЕДРА</th>
                                            <th>ТАЛИЯ | ПОЯС</th>
                                            <th>ЕВРО</th>
                                            <th>СОВЕТСКИЕ</th>
                                        </tr>
                                        <tr>
                                            <td>XS-S</td>
                                            <td>25</td>
                                            <td>78-88</td>
                                            <td>до 64 | 67</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>S</td>
                                            <td>25-26</td>
                                            <td>80-90</td>
                                            <td>до 66 | 70</td>
                                            <td>36</td>
                                            <td>42</td>
                                        </tr>
                                        <tr>
                                            <td>S-M</td>
                                            <td>26</td>
                                            <td>85-92</td>
                                            <td>до 68 | 73</td>
                                            <td> - </td>
                                            <td> - </td>
                                        </tr>
                                        <tr>
                                            <td>M</td>
                                            <td>27</td>
                                            <td>91-96</td>
                                            <td>до 70 | 77</td>
                                            <td>38</td>
                                            <td>44</td>
                                        </tr>
                                        <tr>
                                            <td>M-L</td>
                                            <td>28</td>
                                            <td>93-100</td>
                                            <td>до 73 | 80</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>L</td>
                                            <td>29</td>
                                            <td>97-104</td>
                                            <td>до 76 | 83</td>
                                            <td>40</td>
                                            <td>46</td>
                                        </tr>
                                        <tr>
                                            <td>XL</td>
                                            <td>29-30</td>
                                            <td>104-108</td>
                                            <td>до 79 | 86</td>
                                            <td>-</td>
                                            <td>48</td>
                                        </tr>
                                        <tr>
                                            <td>XXL</td>
                                            <td>31-32</td>
                                            <td>108-112</td>
                                            <td>до 82 | 94</td>
                                            <td>-</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>XXXL</td>
                                            <td>33+	</td>
                                            <td>112-116+</td>
                                            <td>до 85 | 97</td>
                                            <td>-</td>
                                            <td>52</td>
                                        </tr>
                                    </table>
                                    <p>Рекомендуем обратить Ваше внимание на объем бедер являющийся максимально точным и наиболее важны параметром при покупке джинс или брюк.</p>
                                    <p>Объем талии, пояса или ремня является условным размером так как во многом зависит от высоты посадки модели. Дополнительные трудности приносит неоднозначность места измерения талии и степени натяжения сантиметра.</p>
                                    <p>Рост женских джинс и брюк не указан так как он стандартный 32-ый (от 81 см по внутреннему шву). Девушки с ростом до 176 см могут быть уверены, что длина штанины не окажется короткой.</p>
                                </article>
                                <article class="tab-2">
                                    <table>
                                        <tr>
                                            <th>МИР</th>
                                            <th>ДЖИНС</th>
                                            <th>БЕДРА</th>
                                            <th>ТАЛИЯ | ПОЯС</th>
                                            <th>ЕВРО</th>
                                            <th>СОВЕТСКИЕ</th>
                                        </tr>
                                        <tr>
                                            <td>XS-S</td>
                                            <td>28</td>
                                            <td>95</td>
                                            <td>до 80 | 81</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>S</td>
                                            <td>29</td>
                                            <td>101</td>
                                            <td>до 82 | 84</td>
                                            <td>42</td>
                                            <td>46</td>
                                        </tr>
                                        <tr>
                                            <td>S-M</td>
                                            <td>30</td>
                                            <td>107</td>
                                            <td>до 84 | 88</td>
                                            <td> - </td>
                                            <td> - </td>
                                        </tr>
                                        <tr>
                                            <td>M</td>
                                            <td>31</td>
                                            <td>112</td>
                                            <td>до 84 | 92</td>
                                            <td>44</td>
                                            <td>48</td>
                                        </tr>
                                        <tr>
                                            <td>M-L</td>
                                            <td>32</td>
                                            <td>114</td>
                                            <td>до 89 | 94</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>L</td>
                                            <td>33</td>
                                            <td>116</td>
                                            <td>до 92 | 97</td>
                                            <td>46</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>XL</td>
                                            <td>34</td>
                                            <td>118</td>
                                            <td>до 95 | 101</td>
                                            <td>48</td>
                                            <td>52</td>
                                        </tr>
                                        <tr>
                                            <td>XXL</td>
                                            <td>36</td>
                                            <td>124</td>
                                            <td>  ... | 104</td>
                                            <td>50</td>
                                            <td>54</td>
                                        </tr>
                                        <tr>
                                            <td>3XL</td>
                                            <td>38</td>
                                            <td>126</td>
                                            <td>  ... | 108</td>
                                            <td>52</td>
                                            <td>56</td>
                                        </tr>
                                        <tr>
                                            <td>4XL</td>
                                            <td>40</td>
                                            <td>130</td>
                                            <td>  ... | 112</td>
                                            <td>56</td>
                                            <td>58</td>
                                        </tr>
                                        <tr>
                                            <td>5XL</td>
                                            <td>42</td>
                                            <td>135</td>
                                            <td>  ... | 118</td>
                                            <td>56</td>
                                            <td>60</td>
                                        </tr>
                                        <tr>
                                            <td>6XL</td>
                                            <td>44</td>
                                            <td>139</td>
                                            <td>  ... | 125</td>
                                            <td>58</td>
                                            <td>62</td>
                                        </tr>
                                    </table>
                                    <p>Рост мужских джинс и брюк не указан так как он стандартный 34-ый (от 83 см по внутреннему шву). Парни с ростом до 186 см могут быть уверены, что длина штанины не окажется короткой</p>
                                </article>
                            </div>
                        </div>
                    </div><!-- id="myModal" -->



                    <div class="ruler" id="ruler">
                        <img src="{{ asset(env('THEME')) }}/img/ruler-icon.png" alt="Таблица размеров">
                        <p >Таблица размеров</p>
                    </div>
                    @if($product->count > 0)
                    <div data-id="{{ $product->id }}" data-url="{{ route('cartBy') }}" class="product-buy">
                        Добавить в корзину
                        </div>
                        @endif
                </div>
                <div class="product-number">
                    <p>Звоните по телефону для обсуждения всех подробностей</p>
                    <a href="tel:{{$telephoneKiev OR ''}}" class="phone"> {{$telephoneKiev OR ''}} </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="product-description">
            {{$product->desc}}
        </div>
    </div>
    <div class="slider-catalog">
        <div class="title-carousel">
            <p>Товары этой фирмы</p>
        </div>
        <div class="slider-catalog">
            <div class="multiple-item">

                @foreach($products as $product)
                <div class="item">
                    <a href="{{ route('productOne', ['id' => $product->id ] )  }}" class="item-tovar">
                        <div class="img-tovar">
                            @if(in_array(str_replace('catalog/', '' ,$product->photo_maine.'.jpg' ), $images ))
                                <img src="{{asset(env('THEME')).'/img/'. $product->photo_maine}}.jpg" alt="{{ $product->categories }}">
                            @else
                                <img src="{{ asset(env('THEME'))}}/img/system/no-image.png" alt="{{ $product->categories }}">
                            @endif
                        </div>
                        <div class="brand">{{ $product->label }}</div>
                        <div class="description">{{ $product->title }}</div>
                        <div class="price">{{ $product->price_many }}<i class="fa fa-usd" aria-hidden="true"></i></div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>







    </div>

</div><!--wrapper-->

<div class="modal-box modal-cart">
    <span class="close">&times;</span>
    <div class="order-contents order-modal">
        <h3>
            Содержимое заказа
        </h3>
        <table class="ttt">
            <tbody></tbody>
        </table>
        <div class="total">
            <h4 >
                Итого к оплате  <span></span>$
            </h4>
            <div class="but">
                <a href="#" onclick="$('.modal-cart').hide(); return false;" class="but-cart exit">
                    Продолжить покупки
                </a>
                <a href="{{ route('cart') }}" class="but-cart">
                    Оформить заказ
                </a>
            </div>
        </div>
    </div>
</div>