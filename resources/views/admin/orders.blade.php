<div class="container">
    @section('center-column')
    	<h2>Список заказов</h2>
        <a href="{{ route('admin.order.create') }}" class="btn btn-primary">Добавить заказ</a>
		<table class="table  table-hover table-admin">
            <thead>
            <tr class="su-even">
                <th>ID заказа</th>
                <th>Клиент</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Адрес доставки</th>
                <th>Сумма заказа</th>
                <th>Позиции</th>
                <th>Дата заказа</th>
                <th>Дата доставки</th>
                <th>Оплачен?</th>
                <th>Доставлен?</th>
                <th>Статус</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
			<tbody>
    			@forelse($orders as $order)
                    @php 
                        $customer = DB::table('customers')->get()
                            ->where('id', $order->customer_id)
                            ->first();
                        $userId = $customer->user_id;
                        $user = DB::table('users')
                            ->where('id', $userId)
                            ->first();
                        $email = $user->email;
                    @endphp
    			  
                    <tr>
                        <td> {{ $order->id or ''}} </td>
                        <td> {{ $customer->name . ' ' . $customer->surname}} </td>
                        <td> {{ $customer->phone or ''}} </td>
                        <td> {{ $email or ''}} </td>
                        <td> {{ $order->address or ''}} </td>
                        <td> {{ $order->order_amount or ''}} </td>
                        <td> <a href="admin/orders/details/{{$order->id}}">Позиции</a></td>
                        <td> {{ $order->created_at or '' }} </td>
                        <td> {{ $order->shipdate or '' }} </td>
                        <td> {{ $order->is_paid ? 'да' : 'нет' }} </td>
                        <td> {{ $order->is_shipped ? 'да' : 'нет'  }} </td>
                        <td> @switch($order->is_active)
                            @case(1)
                                активен
                                @break
                            @case(2)
                                исполнен
                                @break
                            @case(0)
                                отменен
                                @break
                            @default
                                активен
                        @endswitch
                        </td>
                        <td> <a href="admin/orders/edit/{{$order->id}}">Редактировать</a></td>
                        <td> <a href="admin/orders/delete/{{$order->id}}">Удалить</a></td>
                    </tr>
                @empty
                	Нет заказов
                @endforelse
            </tbody>
        </table>
    @show
</div>

