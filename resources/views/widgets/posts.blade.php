<div class="widget-posts  push-down-30">
     <h3>Попробуйте новинки!</h3>
        <div class="tab-content">
            <div class="tab-pane  fade  in  active" id="recent-posts">
                @foreach($products as $product)
                    <div class="push-down-25">
                       <a href="{{ route('productOne', $product->id) }}"><img src="/image/fit/130/115/{{$product->image}}.jpg" alt="Cake photo"></a>
                        <br>
                        <h5>
                            <a href="{{ route('productOne', $product->id) }}">{{ $product->name }}</a>
                        </h5>
                        <span class="widget-posts__time">{{ $product->price}} руб.</span>
                    </div>
                    <br><hr>
                @endforeach
            </div>
        </div>
    </div>