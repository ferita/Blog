<div class="container">
    @section('center-column')
    	<h2>Список покупателей</h2>
       
		<table class="table  table-hover table-admin">
            <thead>
            <tr class="su-even">
                <th>ID покуп.</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Заказы</th>
                <th>Дата рождения</th>
                <th>Дата регистрации</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
			<tbody>
    			@forelse($customers as $customer)
                    @php 
                        $customerModel = DB::table('customers')->get()
                            ->where('id', $customer->id)
                            ->first();
                        $userId = $customerModel->user_id;
                        $user = DB::table('users')
                            ->where('id', $userId)
                            ->first();
                        $email = $user->email;
                    @endphp
    			  
                    <tr>
                        <td> {{ $customer->id or ''}} </td>
                        <td> <a href="/admin/users/edit/{{$customer->user_id}}">{{ $customer->name or ''}}</a> </td>
                        <td> {{ $customer->surname or ''}} </td>
                        
                        <td> {{ $email or ''}} </td>
                        <td> {{ $customer->phone or ''}} </td>
                        <td> <a href="admin/customers/ordersByCustomer/{{$customer->id}}">Заказы</a></td>
                        <td> {{ \Carbon\Carbon::parse($customer->birthdate)->format('d-m-Y')}} </td>
                        <td> {{ \Carbon\Carbon::parse($customer->created_at)->format('d-m-Y H:i') }} </td>
                        <td> <a href="admin/customers/edit/{{$customer->id}}">Редактировать</a></td>
                        <td> <a href="admin/customers/delete/{{$customer->id}}" onclick="return confirm('Вы уверены?');">Удалить</a></td>
                    </tr>
                @empty
                	Нет покупателей
                @endforelse
            </tbody>
        </table>
    @show
</div>

