<div class="container">
    @section('center-column')
    	<h2>Список пользователей</h2>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Добавить пользователя</a>
		<table class="table  table-hover">
            <thead>
            <tr class="su-even">
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Дата регистрации</th>
                <th>Статус</th>
                <th>Редактировать</th>
                <th>Забанить</th>
                <th>Удалить</th>
            </tr>
            </thead>
			<tbody>
			
			@forelse($users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->created_at }} </td>
                    <td> to do </td>
                    <td> <a href="admin/users/edit/{{$user->id}}">Редактировать</a></td>
                    <td> <a href="admin/users/ban/{{$user->id}}">Забанить</a></td>
                    <td> <a href="admin/users/delete/{{$user->id}}">Удалить</a></td>
                </tr>
            @empty
            	Нет пользователей
            @endforelse
            </tbody>
        </table>
    @show
</div>


