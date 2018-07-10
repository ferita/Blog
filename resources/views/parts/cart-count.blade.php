  @if (Cart::count() == 0)
    <div class="alert">Ваша корзина пуста</div> 
    <a href="{{ route('products.index') }}" class="btn btn-primary">Выбрать самый вкусный торт!</a>
 
@else
    <div class="total-count">
        <p class="total">ИТОГО: <strong>{{ Cart::total() }}</strong></p>
        <a href="{{ route('order.index') }}" class="btn btn-primary">Оформить заказ</a>
    </div>
@endif