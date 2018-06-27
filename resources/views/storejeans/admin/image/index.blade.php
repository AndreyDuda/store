<div class="content">
<h1> Хранилище картинок</h1>
    @if($products)
        <div class="wrapper">
            @foreach($products as $product)
                <a href="{{ route('productOne', ['id' => $product->product_id ] )  }}" class="item-tovar">
                    <div class="img-tovar">
                        @if(file_exists( asset(env('THEME') . '/img/' . $product->photo  . '.jpg')))
                            <img src="{{ asset(env('THEME'))}}/img/{{ $product->photo }}.jpg" alt="">
                        @else
                            <img src="{{ asset(env('THEME'))}}/img/catalog/no-image.png" alt="">
                        @endif
                    </div>
                    <div class="brand">{{ $product->label }}</div>
                    <div class="description">{{ $product->title }}</div>
                    <div class="price">{{ $product->price_many }}<i class="fa fa-usd" aria-hidden="true"></i></div>
                </a>
            @endforeach
        </div>
    @endif
</div>

{{--
@if($products)
    <div class="wrapper">
        @foreach($products as $product)
            <a href="{{ route('productOne', ['id' => $product->product_id ] )  }}" class="item-tovar">
                <div class="img-tovar">
                    @if(file_exists( asset(env('THEME') . '/img/' . $product->photo  . '.jpg')))
                        <img src="{{ asset(env('THEME'))}}/img/{{ $product->photo }}.jpg" alt="">
                    @else
                        <img src="{{ asset(env('THEME'))}}/img/catalog/no-image.png" alt="">
                    @endif
                </div>
                <div class="brand">{{ $product->label }}</div>
                <div class="description">{{ $product->title }}</div>
                <div class="price">{{ $product->price_many }}<i class="fa fa-usd" aria-hidden="true"></i></div>
            </a>
        @endforeach
    </div>
@endif--}}
