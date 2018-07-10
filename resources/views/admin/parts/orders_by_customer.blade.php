<div class="edit boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Заказы покупателя {{ $customer->name . ' ' . $customer->surname }}</h3>
        	<div class="details">
                	<ul>
                		@forelse($orders as $order)
	                		<li>
	                		    <a href="admin/orders/details/{{$order->id}}"> Заказ № {{ $order->id or '' }}</a>  от {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }} на сумму:  {{ $order->order_amount or '' }} руб.
	                		</li>
                        @empty
                            <p><i>Список заказов пуст</i></p>
                		@endforelse
                	</ul>
                </p><br>
        	</div>
        	<a href="{{ route('admin.customers') }}" class="btn btn-primary">К списку покупателей</a>
        </div>
    </div>
</div>
