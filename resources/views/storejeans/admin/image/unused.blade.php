<div class="content">
    <div class="flex">
        <h1>Неиспользуемые картинки</h1>
        <form action="{{ route('unusedImage') }}" method="post">
            {{ csrf_field() }}
            <input class="search-admin search-admin-submit " type="submit" value="Удалить все">
            <input type="text" placeholder="Поиск..." class="search-admin search-img">
        </form>
    </div>
    @if($images)
        <div class="wrapper wrapper-admin">
            <div class="blocks-admin flex">
                @foreach($images as $image)
                    @if($image != '.' && $image != '..')
                        <div class="block-admin flex img-for-product" title="{{str_replace('.jpg','',$image)}}">
                            <div class=" img-tovar-admin ">
                                <img src="{{asset('public/'.'storejeans') . '/img/catalog/'.  $image }}" alt="">
                            </div>
                            <p class="brand">{{ $image }}</p>
                            <img class="edit-delete edit-delete-foto delete-for-img" src="{{asset('public/'.'storejeans') . '/img/system/delete.png' }}" alt="">
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    @endif
</div>

