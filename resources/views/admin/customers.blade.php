<div class="container">
    @section('center-column')
    	<h2>Список покупателей</h2>
		<table class="table  table-hover table-admin">
            <thead>
            <tr class="su-even">
                <th>ID покупателя</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Дата рождения</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Дата регистрации</th>
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
                        <td> {{ $customer->name or ''}} </td>
                        <td> {{ $customer->surname or ''}} </td>
                        <td> {{ $customer->birthdate or ''}} </td>
                        <td> {{ $email or ''}} </td>
                        <td> {{ $customer->phone or ''}} </td>
                        <td> {{ $customer->created_at or '' }} </td>
                    </tr>
                @empty
                	Нет покупателей
                @endforelse
            </tbody>
        </table>
    @show
</div>

