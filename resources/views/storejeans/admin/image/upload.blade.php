<div class="content">

<h2 class="table-name">Добавить картинки в хранилище сайта </h2>
<form action="{{ route('uploadImage') }}" autocomplete="off" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <ul>
        <label> Картинки </label>
        <input type="file" class="town" name="image[]" multiple>
        </li>
    </ul>
    <input class="cart-submit" type="submit" value="Загрузить">
</form>

</div>