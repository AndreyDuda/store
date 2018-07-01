<div class="show-order">
    <div class="header-text">
        <input type="hidden" id="url" value="{{route('successOrder')}}">
        @if($order->new ==2)
            <h4 style="background:lightgreen;">
                Статус заказа: НЕ ОБРАБОТАН
                <div class="block-position">
                    <div class="order-true click_order" data-order="success">Обработать заказ</div>
                    <div class="order-false click_order"  data-order="delete">Заказ отменен</div>
                </div>
            </h4>
        @elseif($order->new == 1)
            <h4 style="background:lightgray;">
                Статус заказа: ОБРАБОТАН
                <div class="block-position">

                </div>
            </h4>
        @else
            <h4 style="background:red; color:white;">
                Статус заказа: ОТМЕНЕН
                <div class="block-position">

                </div>
            </h4>
        @endif

        <h3>Номер заказа #{{ $order->id }}</h3>
    </div>
    <div class="order-info">
        <table>
            <tr>
                <td>ФИО:</td>
                <td>{{ $order->fio }}</td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <td>Тел:</td>
                <td>{{ $order->telephone }}</td>
            </tr>
            <tr>
                <td>Адрес доставки:</td>
                <td>{{$order->country.', '.$order->city.', '.$order->delivery}}</td>
            </tr>
            <tr>
                <td>Способ оплаты:</td>
                <td>{{ $order->oplata }}</td>
            </tr>

        </table>
        <div>
            <h4>Комментарий к заказу: </h4>
            <p>
                {{$order->comment}}
            </p>
        </div>
    </div>
    <div class="order-contents order-contents-admin">
        <h3>
            Содержимое заказа
        </h3>
        @if(!$products)
            <h2>
                Корзина пуста
            </h2>

        @else
            <? $total =0;?>
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
                                <img src="img/{{$product->photo}}.jpg">
                                <div>
                                    <a href="#" class="cart-product-company">{{$product->lable}}</a>
                                    <br>
                                    <a href="#" class="cart-product-title">
                                        {{$product->title}}
                                    </a>

                                </div>
                            </div>
                        </td>
                        <td class="font-politica">{{$product->price}}<span> $</span></td>
                        <td class="cart-quantity">
					<span>
					</span>
                            <p>{{ $product->count }} шт.</p>
                            <span>
					</span>
                        </td>
                        <?
                            $total += $product->price * $product->count;
                        ?>
                        <td class="font-politica">{{$product->price * $product->count}} <span> $</span></td>
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