<div class="widget-author  boxed  push-down-30">
    <div class="widget-author__image-container">
        @if($product->image)
            <img class="wp-post-image" src="/image/fit/770/600/{{$product->image }}.jpg" alt="Cake image">
        @endif
    </div>
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="widget-author__content">
                <h4>{{ $product->name }}</h4>
                <p>{{ $product->description }}</p>
                
                @if($product->category_id == 1)
                    <p>Масса: 2 кг</p>
                @elseif($product->category_id == 2)
                    <p>Количество: 6 штук</p>
                @elseif($product->category_id == 3)
                    <p>Масса: 1 кг</p>
                @endif

               <div class="price">{{ $product->price . ' руб.' }}</div>
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

