<div id="body">
    <h3>Покупатель отменил заказ № {{ $order_id }}</h3>
 
    <div class="container">
        <div class="details">
            <h3>Детализация заказа</h3>
            <div>
                <div>Номер заказа: {{ $order_id }} </div>
                <div>Дата заказа: {{ \Carbon\Carbon::parse($order->date)->format('d-m-Y H:i') }} </div>

                <div>Покупатель: {{ $order->customer->name . ' ' . $order->customer->surname}}  </div>
                <div>Email: {{ Auth::user()->email }}</div>
                <div>Телефон: {{ $order->customer->phone or 'не указан'}}</div>
            </div>
        </div>
        <div class="address">
            <h3>Адрес доставки: </h3> {{ $order->address or 'самовывоз' }}
        </div>
        <div id="content" class="full">
            <p><strong>Позиции:</strong>
                <ul>
                    @foreach($order->products as $product)
                        <li>
                            {{ $product->name or '' }} - {{ App\Models\OrderProduct::where('order_id', $order->id)->where('product_id', $product->id)->first()->quantity }} шт. - {{ $product->price * App\Models\OrderProduct::where('order_id', $order->id)->first()->quantity }} руб.
                        </li>
                    @endforeach
                </ul>
            </p>
        </div>
    </div>
</div>