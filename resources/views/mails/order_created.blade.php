
<h2>Поступил новый заказ</h2>

<div id="body">
    <div class="container">
        <div class="details">
            <h3>Детализация заказа</h3>
            <div>
                <div>Номер заказа: {{ $order_id }} </div>
                <div>Дата заказа: {{ date("Y-m-d H:i:s") }} </div>
                <div>Покупатель: {{ $data['name'] }}</div>
                <div>Email: {{ $data['email'] }}</div>
                <div>Телефон: {{ $data['phone'] }}</div>
                <div>Срок готовности: {{ $data['shipdate'] }}</div>
            </div>
        </div>
        <div class="address">
            <h3>Адрес доставки: {{ $data['address'] }}</h3>
            <div>
            </div>
        </div>
        <div id="content" class="full">
            <div class="cart-table">
                <table>
                    <tr>
                        <th class="items">Описание</th>
                        <th class="price">Цена</th>
                        <th class="qnt">Кол-во</th>
                        <th class="total">Сумма</th>
                        <th class="delete"></th>
                    </tr>
                    
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td class="items">
                                <div class="image">
                                   <a href="{{ route('productOne', $item->model->id) }}"><img src="{{ asset('assets/images/products/min/'.$item->model->image) }}" alt="Cake photo"></a>
                                </div>
                                <h3><a href="{{ route('productOne', $item->model->id) }}">{{ $item->model->name }}</a></h3>
                                <p>{{ $item->model->description }}</p>
                            </td>
                            <td class="price">{{ $item->model->price }}</td>
                            <td class="qnt">
                                <select class="quantity" name='quantity' data-id="{{ $item->rowId }}">
                                    <option {{ $item->qty == 1 ? 'selected' : '' }} >1</option>
                                    <option {{ $item->qty == 2 ? 'selected' : '' }} >2</option>
                                    <option {{ $item->qty == 3 ? 'selected' : '' }} >3</option>
                                </select>
                            </td>
                            <td class="total">{{ $item->model->price }}</td>
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