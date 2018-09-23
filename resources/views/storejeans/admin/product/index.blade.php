
<div class="content">
    <input type="hidden" id="adminSearchP" value="{{route('adminProduct')}}">
    <input type="hidden" id="adminDelete" value="{{route('deleteProduct')}}">
    <input type="hidden" id="adminEdit" value="{{route('editProduct')}}">
    <input type="hidden" id="adminImgSystem" value="{{asset('storejeans')}}">
    <form action="{{route('adminProduct')}}" method="GET">
        {{ csrf_field() }}
        <h2 class="table-name" style="float: left">Список товаров</h2><br><br><input name="product" type="number" id="serchCode" style="float: right" placeholder="Поиск по штрихкоду" value="{{$serach}}"><button class="btn btn-success main-bg-color" style="float: right; height: 25px; margin-right: 5px" type="submit" value="Поиск">Поиск</button>
    </form>
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
        <tbody id="productAdmin">
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
        </tbody>
    </table>
    @if($products)
        <div class="navigation">
            <?php
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