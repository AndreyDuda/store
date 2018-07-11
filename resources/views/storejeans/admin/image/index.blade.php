<div class="content">
    <input type="hidden" id="urlDelImg" value="{{route('unusedImage')}}">
    <div class="flex">
        <h1>Все картинки</h1>
        <form action="#" method="post">
            {{ csrf_field() }}
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
                                <img src="{{asset('storejeans') . '/img/catalog/'.  $image }}" alt="">
                            </div>
                            <p class="brand">{{ $image }}</p>
                            <img class="edit-delete edit-delete-foto delete-for-img" src="{{asset('public/'.env('THEME')) . '/img/system/delete.png' }}" alt="">
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    @endif
</div>

