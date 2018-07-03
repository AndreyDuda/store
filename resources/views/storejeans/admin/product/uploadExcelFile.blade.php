<div class="content">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <h2 class="table-name">Добавить товары через Excel </h2>
<form action="{{ route('readExcel') }}" autocomplete="off" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <ul>
            <label> Excel </label>
            <input type="file" class="town" name="excel">
        </li>
    </ul>
    <input class="cart-submit" type="submit" value="Загрузить">
</form>

    <form action="{{route('deleteAllProduct')}}" method="post">
        {{ csrf_field() }}
        <input class="cart-submit" type="submit" value="Удалить все товары">
    </form>
</div>