<?
$total = 0;
?>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="margin"></div>
<h2 class="title-cart">Оформление заказа</h2>
<div class="wrap-cart">
    <div class="info">
        <h3>
            Контактная информация
        </h3>
        <form action="{{ route('sendRequest') }}" autocomplete="on" method="post">
            {{ csrf_field() }}
            <ul>
                <li>
                    <label> Страна </label>
                    <select name="country" class="info-country">
                        <option disabled selected>Выберите страну</option>
                        <option value="Украина">Украина</option>
                        <option value="Россия">Росиия</option>
                    </select>
                </li>
                <li>
                    <label> Город </label>
                    <input class="town" name="city" type="text">
                </li>
                <li>
                    <label alt="Обязательное поле для заполнения"> ФИО <span> *</span></label>

                    <input class="info-name" name="fio" type="text" required>
                </li>
                <li>
                    <label> Телефон <span> *</span></label>
                    <input class="phone-info" name="telephone" placeholder="+38 ( _ _ _ ) _  _  _  _  _  _  _" type="number" required>
                </li>
                <li>
                    <label> E-mail <span>(для отслеживания заказа) </span></label>
                    <input class="phone-info" name="email" placeholder="exemple@mail.com" type="email">
                </li>
            </ul>
            <div class="cart-payment">
                <h3>
                    Выберите способ оплаты:
                </h3>
                <input  class="radio" name="oplata" type="radio" id="privat-radio" value="Карта Приват Банка">
                <label for="privat-radio"> Карта Приват Банка </label>
                <input  class="radio" name="oplata" type="radio" id="imposed-radio" value="Наложенный платеж">
                <label for="imposed-radio"> Наложенный платеж </label>
                <input  class="radio" name="oplata" type="radio" id="pickup-radio" value="Самовывоз (наличные)">
                <label for="pickup-radio"> Самовывоз (наличные) </label>
            </div>
            <div class="cart-delivery">
                <h3>
                    Выберите способ доставки:
                </h3>
                <input  class="radio" name="delivery" type="radio" id="delivery-pickup-radio" value="Самовывоз">
                <label for="delivery-pickup-radio"> Самовывоз (Одесса, 7 км) </label>
                <input  class="radio" name="delivery" type="radio" id="delivery-nova-radio" value="Новая почта">
                <label for="delivery-nova-radio"> Новая почта </label>
                <input  class="radio" name="delivery" type="radio" id="delivery-intaim-radio" value="Интайм">
                <label for="delivery-intaim-radio"> Интайм </label>
            </div>
            <p>Комментарий к заказу:</p>
            <textarea name="comment" class="text-area" placeholder="Здесь вы можете написать комментарий или уточнение по поводу заказа..."></textarea>

            <div class="product-number info-number">
                <p>После оформления заказа с вами обязательно свяжется менеджер для уточнения подробностей и только после этого заказ будет сформирован !</p>
            </div>
            <input class="cart-submit" type="submit" value="Оформить заказ">
        </form>
    </div>
    <div class="order-contents">
        <h3>
            Содержимое заказа
        </h3>
        @if(!$products)
            <h2>
                Корзина пуста
            </h2>
        @else
        <table>
            <tr>
                <th>Наименование товара</th>
                <th>Цена за шт.</th>
                <th>Кол-во</th>
                <th>Общая стоимость</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>
                    <div class="cart-product-info">
                        @if(@fopen(asset('storejeans').'/img/'. $product['photo'].'.jpg', 'r'))
                            <img src="{{asset('storejeans').'/img/'. $product['photo'].'.jpg'}}" alt="{{$product['lable']}}">
                        @else
                            <img src="{{ asset('storejeans')}}/img/system/no-image.png" alt="{{$product['lable']}}">
                        @endif
                            <div>
                            <a href="#" class="cart-product-company">{{$product['lable']}}</a>
                            <br>
                            <a href="#" class="cart-product-title">
                                {{$product['title']}}
                            </a>

                        </div>
                    </div>
                </td>
                <td class="font-politica">{{$product['price']}}<span> $</span></td>
                <td class="cart-quantity">
					<span>
						<i class="fa fa-minus-circle" aria-hidden="true"></i>
					</span>
                    <p>{{ $product['count'] }} шт.</p>
                    <span>
						<i class="fa fa-plus-circle" aria-hidden="true"></i>
					</span>
                </td>
<?
$total += $product['price'] * $product['count'];
?>
                <td class="font-politica">{{$product['price'] * $product['count']}} <span> $</span></td>
            </tr>
            @endforeach
        </table>

        <div class="total">
            <h4>
                Итого к оплате  <span>{{$total}}</span>$
            </h4>
        </div>
        @endif
    </div>
</div>