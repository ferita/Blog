<div class="">
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
                        $customer = App\Models\Customer::where('id', $order->customer_id)->firstOrFail();
                        $email = $customer->user->email;
                    @endphp
    			  
                    <tr class="{{ $order->is_active === 1 ? 'alert-success' : ''}}">
                        <td> {{ $order->id or ''}} </td>
                        <td> <a href="admin/users/edit/{{$customer->user_id}}">{{ $customer->name . ' ' . $customer->surname}} </a></td>
                        <td> {{ $customer->phone or ''}} </td>
                        <td> {{ $email or ''}} </td>
                        <td> {{ $order->address or ''}} </td>
                        <td> {{ $order->order_amount or ''}} </td>
                        <td> <a href="admin/orders/details/{{$order->id}}">Позиции</a></td>
                        <td> {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i') }} </td>
                        <td> {{ \Carbon\Carbon::parse($order->shipdate)->format('d-m-Y') }} </td>
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
                        <td> <a href="admin/orders/delete/{{$order->id}}" onclick="return confirm('Вы уверены?');">Удалить</a></td>
                    </tr>
                @empty
                	Нет заказов
                @endforelse
            </tbody>
        </table>
    @show
</div>

