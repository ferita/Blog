<div class="widget-categories  push-down-30">
    <h6>АССОРТИМЕНТ</h6>
    <ul>
       @forelse ($categories as $category) 
            <li>
                <a href="/products/category/{{ $category->id }}">{{ $category->name }}<span class="widget-categories__text">  ( {{ $category->products->count() }} ) </span> </a>
            </li>
        @empty
            <p>Список категорий пуст</p>
        @endforelse
    </ul>
</div>