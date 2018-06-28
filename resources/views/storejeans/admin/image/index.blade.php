<div class="content">
    <div class="flex">
        <h1> Все картинок</h1>
        <form action="#" method="post">
            <input class="search-admin search-admin-submit " type="submit" value="Удалить все">
            <input type="text" placeholder="Поиск..." class="search-admin">
        </form>
    </div>
    @if($images)
        <div class="wrapper wrapper-admin">
            <div class="blocks-admin flex">
                @for($i=0;$i<10; $i++)
                @foreach($images as $image)
                    @if($image != '.' && $image != '..')
                        <div class="block-admin flex">
                            <div class=" img-tovar-admin ">
                                <img src="{{asset('public/'.env('THEME')) . '/img/catalog/'.  $image }}" alt="">
                            </div>
                            <p class="brand">{{ $image }}</p>
                            <img class="edit-delete edit-delete-foto" src="{{asset('public/'.env('THEME')) . '/img/catalog/delete.png' }}" alt="">
                        </div>
                    @endif
                @endforeach
                    @endfor
            </div>
        </div>
    @endif
</div>

