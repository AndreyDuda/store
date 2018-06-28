<div class="content">
    <h1> Неиспользуемые картинок</h1>
    <form action="{{route('unusedImage')}}" method="post">
        {{ csrf_field() }}
        <input type="submit" value="Удалить все картинки">
    </form>

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

