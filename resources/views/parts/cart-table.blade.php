<div class="cart-table">
    <table>
        <tr>
            <th class="items">Описание</th>
            <th class="price">Цена</th>
            <th class="qnt">Количество</th>
            <th class="total">Сумма</th>
            <th class="delete"></th>
        </tr>
    
        @foreach (Cart::content() as $item)
            <tr>
                <td class="items">
                    <div class="image">
                       <a href="{{ route('productOne', $item->model->id) }}"><img src="/image/fit/170/135/{{$item->model->image}}.jpg" alt="Cake photo"></a>
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
                <td class="total">{{ $item->model->price * $item->qty }}</td>
                <td class="delete">
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="ico-del"></button>
                    </form>
                </td>
             </tr>
        @endforeach
    </table>
</div>