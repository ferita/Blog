   
<div class="products">
    <div class="row">
        <div class="col-xs-12  col-sm-6">
                      
           @foreach ($products as $product)
                 @if ($loop->index < 3) 
                    <div class="widget-cake  boxed  push-down-30">
                        <div class="widget-cake__image-container">
                            <div class="widget-cake__avatar-pic">
                                @if($product->image)
                                    <a href="/products/{{ $product->id }}"><img src="{{ asset('assets/images/products/'.$product->image) }}" alt="Cake image" width="90" height="190"></a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-10  col-xs-offset-1">
                                <h4><a href="{{ route('productOne', $product->id) }}">{{ $product->name }}</a></h4>
                                <p>{{ $product->description }}</p>
                                <div class="price">{{ $product->price . ' руб.' }}</div>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button type="submit" class="btn btn-cart"><i class="glyphicon glyphicon-shopping-cart"></i> В корзину</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
        <div class="col-xs-12  col-sm-6">
             
                @if ($loop->index >= 3) 
                    <div class="widget-cake  boxed  push-down-30">
                        <div class="widget-cake__image-container">
                            <div class="widget-cake__avatar-pic">
                                @if($product->image)
                                    <a href="/products/{{ $product->id }}"><img src="assets/images/products/{{ $product->image }}" alt="Cake image" width="90" height="90"></a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-10  col-xs-offset-1">
                                <h4><a href="/products/{{ $product->id }}">{{ $product->name }}</a></h4>
                                <p>{{ $product->description }}</p>
                                <div class="price">{{ $product->price . ' руб.' }}</div>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button type="submit" class="btn btn-cart"><i class="glyphicon glyphicon-shopping-cart"></i> В корзину</button>
                                </form>
                            </div>
                        </div>
                    </div>
              @endif
                          
            @endforeach
        </div>
        <?php echo $products->render(); ?>
    </div>
</div>
