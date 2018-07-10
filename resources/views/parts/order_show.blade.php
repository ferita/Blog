<div class="edit boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Детализация заказа № {{$order->id}}</h3>
        	<div class="details">
    	      	<p><strong>Клиент: </strong>{{ $customer->name . ' ' . $customer->surname }}</p>
               
		        <p><strong>Телефон: </strong>{{ $customer->phone or 'не указан' }}</p>
	           
	            <p><strong>E-mail: </strong>{{ $email or '' }} </p>
                	
	           	<p><strong>Сумма заказа: </strong>{{ $order->order_amount or '' }} руб.</p>

	           	<p><strong>Дата доставки: </strong>{{ \Carbon\Carbon::parse($order->shipdate)->format('d-m-Y') }} </p>

	           	<p><strong>Адрес доставки: </strong>{{ $order->address or 'самовывоз' }}</p>
              
	           	<p><strong>Позиции:</strong>
                	<ul>
                		@foreach($products as $product)
	                		<li>
	                			{{ $product->name or '' }} - {{ App\Models\OrderProduct::where('order_id', $order->id)->where('product_id', $product->id)->first()->quantity }} шт. - {{ $product->price * App\Models\OrderProduct::where('order_id', $order->id)->first()->quantity }} руб.
	                		</li>
                		@endforeach
                	</ul>
                </p>
	           	<p><strong>Статус:   </strong> 
                	<ul>
	                	<li> {{ $is_paid == 1 ? 'ОПЛАЧЕН' : 'НЕ ОПЛАЧЕН'}}  </li>
	                    <li> {{ $is_shipped == 1 ? 'ДОСТАВЛЕН' : 'НЕ ДОСТАВЛЕН'}}  </li>
                	</ul>
	           	</p>
        	</div>
        	<a href="{{ route('lk') }}" class="btn btn-primary">К списку заказов</a>
        </div>
    </div>
</div>
