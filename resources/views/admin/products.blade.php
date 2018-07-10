<div class="container">
    @section('center-column')
    	<h2>Ассортимент продукции</h2>
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Добавить продукт</a>
		<table class="table  table-hover table-admin">
            <thead>
            <tr class="su-even">
                <th>ID</th>
                <th>Название</th>
                <th>Slug</th>
                <th>Описание</th>
                <th>Категория</th>
                <th>Фото</th>
                <th>Цена</th>
                <th>Активно</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
			<tbody>

			@forelse($products as $product)

                @php 
                    $productModel = App\Models\Product::find($product->id);
                    $categoryId = $productModel->category_id;
                    $category = App\Models\Category::find($categoryId);
                    $categoryName = $category->name;
                @endphp
			 
                <tr>
                    <td> {{ $product->id }} </td>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->slug }} </td>
                    <td> {{ $product->description }} </td>
                    <td> {{ $categoryName }} </td>
                    <td> {{ $product->image }} </td>
                    <td> {{ $product->price }} </td>
                    <td> {{ $product->is_active ? 'да' : 'нет' }} </td>
                    <td> <a href="admin/products/edit/{{$product->id}}">Редактировать</a></td>
                    <td> <a href="admin/products/delete/{{$product->id}}" onclick="return confirm('Вы уверены?');">Удалить</a></td>
                </tr>
            @empty
            	Список продукции пуст
            @endforelse
            </tbody>
        </table>
    @show
</div>


