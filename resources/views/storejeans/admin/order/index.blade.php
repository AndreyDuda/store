<div class="content" style="padding: 5px; margin: 0;">
    <h2 class="table-name" style="text-align: center;">Заказы</h2>
    {{ csrf_field() }}
    <input type="hidden" id="url" value="{{route('OrderSuccess')}}">
    <table class="admin-table">
        <tr>
            <td style="text-align: center; font-weight: 600; background: lightgrey;">
                ФИО
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey;">
                Телефон
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey;">
               Страна
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey;">
                Город
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey;">
               Оплата
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey;">
                Доставка
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey;">
                На сумму
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey;">
                Комметарии
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey; width: 140px;">
                Дата
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey;">
                Кнопки
            </td>
        </tr>
        @if($order)
            @foreach($order as $item)
                <?php $total=0; ?>
                @if($item->new == 0)
                    <tr style="background: red">
                @else
                        <tr style="background: <?=($item->new == 1)? 'lightgreen': 'gray' ?>;">
                @endif
                    <input type="hidden" value="{{ $item->id }}">
                    <td title="{{ $item->fio }}">
                        {{ $item->fio }}
                    </td>
                    <td title="{{ $item->telephone }}">
                        {{ $item->telephone }}
                    </td>
                    <td title=" {{ $item->country }}">
                        {{ $item->country }}
                    </td>
                    <td title="{{ $item->city }}">
                        {{ $item->city }}
                    </td>
                    <td title="{{ $item->oplata }}">
                        {{ $item->oplata }}
                    </td>
                    <td title="{{ $item->delivery }}">
                        {{ $item->delivery }}
                    </td>
                    <td title="{{$total . ' <span> $</span>'}}" class="font-politica">
                        @foreach( json_decode($item->product,true) as $product)
                            <?php $total += $product['price'] * $product['count']; ?>
                        @endforeach
                        {{$total}} <span> $</span>
                    </td>
                    <td title="{{ $item->comment }}">
                        {{ $item->comment }}
                    </td>
                    <td title="{{ $item->created_at->format('d.m.Y H:i') }}">
                        {{ $item->created_at->format('d.m.Y H:i') }}
                    </td>
                    <td>
                        <a title="Подробней о заказе" href="{{route('OrderShow', ['id'=>$item->id])}}">
                            <img src="{{ asset('storejeans')}}/img/read.png" alt="" class="edit-delete">
                        </a>
                        @if($item->new == 1)
                        <a title="Заказ обработан" data-order="success" class="click_order" href="#" >
                            <img src="{{ asset('storejeans')}}/img/success.png" alt="" class="edit-delete">
                        </a>
                        <a title="Заказ отменен" data-order="delete" class="click_order" href="#" >
                            <img src="{{ asset('storejeans')}}/img/delete.png" alt="" class="edit-delete">
                        </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif

    </table>




</div>