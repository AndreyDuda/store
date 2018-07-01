<div class="content" style="padding: 5px; margin: 0;">
    <h2 class="table-name" style="text-align: center;">Заказы</h2>
    {{ csrf_field() }}
    <input type="hidden" id="url" value="{{route('successOrder')}}">
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
                        <a title="Заказ обработан" data-order="success" class="click_order" href="#" onclick="return false;">
                            <img src="{{ asset('storejeans')}}/img/success.png" alt="" class="edit-delete">
                        </a>
                        <a title="Заказ отменен" data-order="delete" class="click_order" href="#" onclick="return false;">
                            <img src="{{ asset('storejeans')}}/img/delete.png" alt="" class="edit-delete">
                        </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif

    </table>
    @if($order)
        <div class="navigation">
            <?
            $count_order = $order->lastPage();
            ?>
            @if($count_order > 1)
                <ul>
                    @if($order->currentPage() != 1)
                        <a href="{{ $order->url( 1 ) }}" class="selected"> <span class="page">1<i class="fa fa-arrow-left" aria-hidden="true"></i></span></a>
                    @endif

                    @for($i = 1; $i <= $count_order; $i++)
                        @if($order->currentPage() > $i && $order->currentPage()-$i < $step && $order->currentPage() != $count_order - 1)
                            <a href="{{  $order->url($i) }}" class="selected"><li class="page">{{ $i }}</li></a>
                        @elseif($order->currentPage() == $i)
                            <a href="{{  $order->url($i) }}" class="selected"><li class="current page">{{ $i }}</li></a>
                        @elseif($order->currentPage() < $i && $i - $order->currentPage() < $step && $order->currentPage() != $count_order - 1)
                            <a href="{{  $order->url($i) }}" class="selected"><li class="page">{{ $i }}</li></a>
                        @endif
                    @endfor
                    {{--<li class="not-hover"> ... </li>--}}
                    @if($order->currentPage() != $count_order)
                        <a href="{{  $order->url($count_order) }}" class="selected"><span><i class="fa fa-arrow-right page" aria-hidden="true">{{$count_order}}</i></span></a>
                    @endif
                </ul>
            @endif
        </div>
    @endif

</div>