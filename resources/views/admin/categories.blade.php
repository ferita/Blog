<div class="container">
    @section('center-column')
    	<h2>Категории</h2>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Добавить категорию</a>
		<table class="table  table-hover table-admin">
            <thead>
            <tr class="su-even">
                <th>ID</th>
                <th>Название</th>
                <th>Slug</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
			<tbody>

			@forelse($categories as $category)
                <tr>
                    <td> {{ $category->id }} </td>
                    <td> {{ $category->name }} </td>
                    <td> {{ $category->slug }} </td>
                    <td> <a href="admin/categories/edit/{{$category->id}}">Редактировать</a></td>
                    <td> <a href="admin/categories/delete/{{$category->id}}" onclick="return confirm('Вы уверены?');">Удалить</a></td>
                </tr>
            @empty
            	Список категорий пуст
            @endforelse
            </tbody>
        </table>
    @show
</div>


