<div class="content">
    <h2 class="table-name">Table name</h2>
    <table class="admin-table">
        <tr>
            <td>
                ФИО
            </td>
            <td>
                Телефон
            </td>
            <td>
               Страна
            </td>
            <td>
                Город
            </td>
            <td>
               Оплата
            </td>
            <td>
                Доставка
            </td>
            <td>
                Товары на сумму
            </td>
            <td>
                Комметарии
            </td>
            <td>
                Дата
            </td>
            <td>
                Кнопки
            </td>
        </tr>
        @if($order)
            @foreach($order as $item)
                <?php $total=0; ?>
                <tr>
                    <td>
                        {{ $item->fio }}
                    </td>
                    <td>
                        {{ $item->telephone }}
                    </td>
                    <td>
                        {{ $item->country }}
                    </td>
                    <td>
                        {{ $item->city }}
                    </td>
                    <td>
                        {{ $item->oplata }}
                    </td>
                    <td>
                        {{ $item->delivery }}
                    </td>
                    <td class="font-politica">
                        @foreach( json_decode($item->product,true) as $product)
                            <?php $total += $product['price'] * $product['count']; ?>
                        @endforeach
                        {{$total}} <span> $</span>
                    </td>
                    <td>
                        {{ $item->comment }}
                    </td>
                    <td>
                        {{ $item->created_at }}
                    </td>
                    <td>
                        Кнопки
                    </td>
                </tr>
            @endforeach
        @endif

    </table>
    <a href="#">показать ещё 50 товаров >></a>

</div>