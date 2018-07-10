<div class="widget-categories  push-down-30">
    <h5>АССОРТИМЕНТ</h5>
    <ul class="category-list">
        
       @forelse ($categories as $category) 
            <li class = "{{ (Request::path() == "products/category/$category->slug") ? 'active' : '' }}">
                <a href="/products/category/{{ $category->slug }}">{{ $category->name }}<span class="widget-categories__text">  ( {{ $category->products->where('is_active', '1')->count() }} ) </span> </a>
            </li>
        @empty
            <p>Список категорий пуст</p>
        @endforelse
    </ul>
</div>