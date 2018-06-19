<div class="content">
    <h2 class="table-name">Table name</h2>
    <table class="admin-table">
        <tr>
            <td>
                Код товара
            </td>
            <td>
                Фирма
            </td>
            <td>
                Title
            </td>
            <td>
                Размер
            </td>
            <td>
               Быстрые настройки
            </td>
        </tr>

        @foreach($products as $product)
            <tr>
                <td>
                    {{$product->code}}
                </td>
                <td>
                    {{$product->label}}
                </td>
                <td>
                    {{$product->title}}
                </td>
                <td>
                    {{$product->size}}
                </td>
                <td >
                    <a href="{{route('editProduct')}}">
                        <img src="{{ asset(env('THEME'))}}/img/edit.png" alt="" class="edit-delete">
                    </a>
                    <a href="{{route('editProduct')}}">
                        <img src="{{ asset(env('THEME'))}}/img/delete.png" alt="" class="edit-delete">
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    @if($products)
        <div class="navigation">
            <?

            $count_product = $products->lastPage();
            ?>
            @if($count_product > 1)
                <ul>
                    @if($products->currentPage() != 1)
                        <a href="{{ $products->url( 1 ) }}" class="selected"> <span class="page">1<i class="fa fa-arrow-left" aria-hidden="true"></i></span></a>
                    @endif

                    @for($i = 1; $i <= $count_product; $i++)
                        @if($products->currentPage() > $i && $products->currentPage()-$i < $step && $products->currentPage() != $count_product - 1)
                                <a href="{{  $products->url($i) }}" class="selected"><li class="page">{{ $i }}</li></a>
                        @elseif($products->currentPage() == $i)
                                <a href="{{  $products->url($i) }}" class="selected"><li class="current page">{{ $i }}</li></a>
                        @elseif($products->currentPage() < $i && $i - $products->currentPage() < $step && $products->currentPage() != $count_product - 1)
                                <a href="{{  $products->url($i) }}" class="selected"><li class="page">{{ $i }}</li></a>
                        @endif
                    @endfor
                    {{--<li class="not-hover"> ... </li>--}}
                    @if($products->currentPage() != $count_product)
                            <a href="{{  $products->url($count_product) }}" class="selected"><span><i class="fa fa-arrow-right page" aria-hidden="true">{{$count_product}}</i></span></a>
                    @endif
                </ul>
            @endif
        </div>
    @endif
    <span class="table-text">Общее количество - 1546 товаров</span>
    <span class="table-text">Товаров на сумму - 23456789 грн. </span>
</div>