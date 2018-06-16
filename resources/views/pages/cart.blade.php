<div id="body">
    <div class="container">
        <div id="content" class="full">
            <div>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif
            </div>
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
            @if (Cart::count() == 0)
                <div class="alert">Ваша корзина пуста</div> 
                <a href="{{ route('products.index') }}" class="btn btn-primary">Выбрать самый вкусный торт!</a>
             
            @else
                <div class="total-count">
                    <p class="total">ИТОГО: <strong>{{ Cart::total() }}</strong></p>
                    <a href="#" class="btn btn-primary">Оформить заказ</a>
                </div>
            @endif
        </div>
    </div>
</div>
@section('extra-js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch('/cart/${id}', {
                        quantity: this.value
                      })
                      .then(function (response) {
                        //console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                      })
                      .catch(function (error) {
                        console.log(error);
                      });
                    })
                })
            })();
    </script>
@endsection
