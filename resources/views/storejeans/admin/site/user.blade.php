<div id="app" class="app">
    <h3>Пользователи</h3>
    <div class="panel-body">
        <table class="users-table">
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Почта</th>
            </tr>
            @foreach($users as $key => $user)
                <tr>
                    <td>{{$key+1}}.</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>

            @endforeach
        </table>
    </div>
</div>s