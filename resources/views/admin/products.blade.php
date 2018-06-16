<div class="container">
    @section('center-column')
    	<h2>Ассортимент продукции</h2>
		<table class="table  table-hover table-admin">
            <thead>
            <tr class="su-even">
                <th>ID</th>
                <th>Название</th>
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
                    $productModel = DB::table('products')->get()
                        ->where('id', $product->id)
                        ->first();
                    $categoryId = $productModel->category_id;
                    $category = DB::table('categories')
                        ->where('id', $categoryId)
                        ->first();
                    $categoryName = $category->name;
                @endphp
			 
                <tr>
                    <td> {{ $product->id }} </td>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->description }} </td>
                    <td> {{ $categoryName }} </td>
                    <td> {{ $product->image }} </td>
                    <td> {{ $product->price }} </td>
                    <td> {{ $product->is_active }} </td>
                    <td> <a href="admin/products/edit/{{$product->id}}">Редактировать</a></td>
                    <td> <a href="admin/products/delete/{{$product->id}}">Удалить</a></td>
                </tr>
            @empty
            	Список продукции пуст
            @endforelse
            </tbody>
        </table>
    @show
</div>


