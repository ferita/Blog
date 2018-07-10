<div class="container">
    @section('center-column')
    	<h2>Список пользователей</h2>
        @can('create', App\Models\User::class)
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Добавить пользователя</a>
        @endcan
		<table class="table  table-hover">
            <thead>
            <tr class="su-even">
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Дата регистрации</th>
                <th>Статус</th>
                @can('update', App\Models\User::class)
                    <th>Редактировать</th>
                    <th>Удалить</th>
                @endcan
            </tr>
            </thead>
			<tbody>
			
			@forelse($users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i') }} </td>
                    <td> @switch($user->status)
                            @case(1)
                                пользователь
                                @break
                            @case(2)
                                менеджер
                                @break
                            @case(3)
                                админ
                                @break
                            @case(0)
                                забанен
                                @break
                            @default
                                пользователь
                        @endswitch
                    </td>
                    @can('update', App\Models\User::class)
                        <td> <a href="admin/users/edit/{{$user->id}}">Редактировать</a></td>
                        <td> <a href="admin/users/delete/{{$user->id}}" onclick="return confirm('Вы уверены?');">Удалить</a></td>
                    @endcan
                </tr>
            @empty
            	Нет пользователей
            @endforelse
            </tbody>
        </table>
    @show
</div>


