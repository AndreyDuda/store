<div id="app" class="app">
    <h3>Пользователя</h3>
    <div class="panel-body">
    @foreach($users as $key => $user)
        {{$key+1 . '. имя : ' . $user->name . ' почта :' . $user->email}}
    @endforeach
    </div>
</div>