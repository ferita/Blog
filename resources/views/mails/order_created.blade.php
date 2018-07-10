<div id="body">
    <h3>Поступил новый заказ</h3>
    <div class="container">
        <div class="details">
            <h3>Детализация заказа</h3>
            <div>
                <div>Номер заказа: {{ $order_id }} </div>
                <div>Дата заказа: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }} </div>
                <div>Покупатель: {{ $data['name'] }} {{ $data['surname'] }} </div>
                <div>Email: {{ $data['customer_email'] ?? Auth::user()->email }}</div>
                <div>Телефон: {{ $data['phone'] }}</div>
                <div>Срок готовности: {{ \Carbon\Carbon::parse($data['shipdate'])->format('d-m-Y') }}</div>
            </div>
        </div>
        <div class="address">
            <h3>Адрес доставки: {{ $data['address'] or 'самовывоз' }}</h3>
        </div>
        <div id="content" class="full">
            <div class="cart-table">
                <table>
                    <tr>
                        <th class="items">Описание</th>
                        <th class="price">Цена</th>
                        <th class="qnt">Кол-во</th>
                        <th class="total">Сумма</th>
                    </tr>
                    
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td class="items">
                                <h3><a href="{{ route('productOne', $item->model->id) }}">{{ $item->model->name }}</a></h3>
                                <p>{{ $item->model->description }}</p>
                            </td>
                            <td class="price"><br><br>{{ $item->model->price }}</td>
                            <td class="qnt"><br><br> {{ $item->qty }} </td>
                            <td class="total"><br><br>{{ $item->model->price * $item->qty }}</td>
                         </tr>
                    @endforeach
                </table>
            </div>
            <div class="total-count">
                <p class="total">ИТОГО: <strong>{{ Cart::total() }}</strong></p>
             </div>
        </div>
    </div>
</div>