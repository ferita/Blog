<div class="widget-author  boxed  push-down-30">
    <div class="widget-author__image-container">
        @if($product->image)
            <img class="wp-post-image" src="assets/images/products/{{ $product->image }}" alt="Cake image"  width="748" height="324">
        @endif
    </div>
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="widget-author__content">
                <h4>{{ $product->name }}</h4>
                <div class="price">{{ $product->price . ' руб.' }}</div>
                <p>Масса: 2 кг</p>
                <p>{{ $product->description }}</p>

            </div>
           
            <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <button type="submit" class="btn btn-primary">Добавить в корзину</button>
            </form>
        </div>
    </div>
</div>

