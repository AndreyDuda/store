<div class="content">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <h2 class="table-name">Добавление/удаление товаров</h2>

    количество товаров на сайте {{ ($count)? $count:'0' }}
    <br>
    <br>
    <br>
<form action="{{ route('readExcel') }}"class="add-excel" autocomplete="off" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <ul>
            <label> Загрузить товары с помощью файла Excel </label>
            <input type="file" class="town" name="excel">
        </li>
    </ul>
    <input class="cart-submit" type="submit" value="Загрузить">
</form>

    <form action="{{route('deleteAllProduct')}}" method="post" class="delete-excel">
        {{ csrf_field() }}
        <p>Удаление всех товаров </p>
        <input class="cart-submit" type="submit" value="Удалить">
    </form>
</div>