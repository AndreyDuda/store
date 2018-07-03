<div class="content">
    <h2 class="table-name">Заказы</h2>
    <table class="admin-table">
        <tr>
            <td style="text-align: center; font-weight: 600; background: lightgrey; width:100px;">
                Код товара
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey; width:100px;">
                Фирма
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey; width: 400px;">
                Title
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey;">
                Описание
            </td>
            <td style="text-align: center; font-weight: 600; background: lightgrey; width: 100px;">
               Управление
            </td>
        </tr>

        @foreach($products as $product)
            <tr>
                <td title=" {{$product->code}}">
                    {{$product->code}}
                </td>
                <td title="{{$product->label}}">
                    {{$product->label}}
                </td>
                <td title="{{$product->title}}">
                    {{$product->title}}
                </td>
                <td title="{{$product->desc}}">
                    {{$product->desc}}
                </td>
                <td >
                    <a class="delete-product" title="Удалить товар" href="{{route('deleteProduct', ['id' => $product->id]) }}">
                        <img style="float: right;" src="{{ asset('storejeans')}}/img/delete.png" alt="" class="edit-delete">
                    </a>
                    <a title="Редактировать товар" href="{{route('editProduct', ['id' =>  $product->id]) }}">
                        <img  style="float: right;" src="{{ asset('storejeans')}}/img/edit.png" alt="" class="edit-delete">
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
</div>