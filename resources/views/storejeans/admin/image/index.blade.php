<div class="content">
    <div class="flex">
        <h1>Все картинки</h1>
        <form action="#" method="post">
            <input class="search-admin search-admin-submit " type="submit" value="Удалить все">
            <input type="text" placeholder="Поиск..." class="search-admin">
        </form>
    </div>
    @if($images)
        <div class="wrapper wrapper-admin">
            <div class="blocks-admin flex">

                @foreach($images as $image)
                    @if($image != '.' && $image != '..')
                        <div class="block-admin flex">
                            <div class=" img-tovar-admin ">
                                <img src="{{asset('public/'.env('THEME')) . '/img/catalog/'.  $image }}" alt="">
                            </div>
                            <p class="brand">{{ $image }}</p>
                            <img class="edit-delete edit-delete-foto" src="{{asset('public/'.env('THEME')) . '/img/system/delete.png' }}" alt="">
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    @endif
</div>

