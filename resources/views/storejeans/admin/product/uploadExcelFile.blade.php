<div class="content">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <h2 class="table-name">Добавить товары через Excel </h2>
<form action="{{ route('uploadFileSend') }}" autocomplete="off" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <ul>
            <label> Город </label>
            <input type="file" class="town" name="excel">
        </li>
    </ul>
    <input class="cart-submit" type="submit" value="Загрузить">
</form>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>