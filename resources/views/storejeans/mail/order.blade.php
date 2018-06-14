<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Story Jeans</title>
</head>
<body>
@if(!$products)
    <h1 style="width: 100%; text-align: center">Уважаемый {{$name}}</h1>
    <p>Ваш заказ принят в обработку. Ближайшее время с Вами свяжется наш менеджер для уточнени заказа.</p>
    <p>С Ув. магази storeJeans</p>
    <p>тел. 099 378 33 31</p>
    <p>тел. 096 002 65 69</p>
    <p>mail. {{$email}}</p>
@else
    <h1 style="width: 100%; text-align: center">Уважаемый Админ</h1>
    <p>Поступил новый заказ от {{$name}}</p>

    <p>тел. {{$tel}}</p>
    <p>mail. {{$user}}</p>

    <?php $total = 0; ?>

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
                    <th>Наименование</th>
                    <th>Код</th>
                    <th>Цена за шт.</th>
                    <th>Кол-во</th>
                    <th>Общая стоимость</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td style="text-align:center;" >
                            <div class="cart-product-info">

                                <div>
                                    <a href="#" class="cart-product-company">{{$product['lable']}}</a>
                                    <br>
                                    <a href="#" class="cart-product-title">
                                        {{$product['title']}}
                                    </a>

                                </div>
                            </div>
                        </td>
                        <td style="text-align:center;"  class="font-politica">{{$product['code']}}</td>
                        <td style="text-align:center;"  class="font-politica">{{$product['price']}}<span> $</span></td>
                        <td style="text-align:center;"  class="cart-quantity">
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
                        <td style="text-align:center;"  class="font-politica">{{$product['price'] * $product['count']}} <span> $</span></td>
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



@endif

</body>
</html>