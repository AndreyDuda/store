<div class="content">
<h1> Хранилище картинок</h1>
    @if($images)
        <div class="wrapper">

            @foreach($images as $image)
                @if($image != '.' && $image != '..')
                    <div class="img-tovar">
                         <img style="width: 150px" src="{{asset('public/'.env('THEME')) . '/img/catalog/'.  $image }}" alt="">
                    </div>
                    <div class="brand">{{ $image }}</div>
                @endif
            @endforeach
        </div>
    @endif
</div>

