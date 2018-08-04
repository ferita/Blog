<div class="">
    @section('center-column')
    	<h2>Мои заказы</h2>
         <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
        </div>
        @if ($orders !== [])
		<table class="table  table-hover table-admin">
            <thead>
                <tr class="su-even">
                    <th>Номер</th>
                    <th>Дата заказа</th>
                    <th>Позиции</th>
                    <th>Сумма</th>
                    <th>Дата доставки</th>
                    <th>Адрес доставки</th>
                    <th>Статус</th>
                    <th>Отменить</th>
                </tr>
            </thead>
			<tbody>
        @endif
    			@forelse($orders as $order)
                   	 
                    <tr class="{{ $order->is_active === 1 ? 'alert-success' : ''}}">
                        <td> {{ $order->id or ''}} </td>
                        <td> {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }} </td>
                        <td> <a href="lk/orders/details/{{$order->id}}">Позиции</a></td>
                        <td> {{ $order->order_amount or ''}} </td>
                        <td> {{ \Carbon\Carbon::parse($order->shipdate)->format('d-m-Y') }} </td>
                        <td> {{ $order->address or 'самовывоз'}} </td>
                        <td> @switch($order->is_active)
                            @case(1)
                                активен
                                @break
                            @case(0)
                                отменен
                                @break
                            @case(2)
                                исполнен
                                @break
                            @default
                                активен
                        @endswitch
                        </td>
                        @if($order->is_active === 1)
                            <td> <a href="lk/orders/cancel/{{$order->id}}" onclick="return confirm('Вы уверены?');">Отменить</a></td>
                        @else <td> Отменен </td>
                        @endif
                    </tr>
                @empty
                	<p>Список заказов пуст</p><br>
                @endforelse
            </tbody>
        </table>
    @show
</div>

