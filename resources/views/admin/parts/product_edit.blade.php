<div class="edit boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Редактирование товара </h3>
        	<div class="edit">
	        	<form class="form-horizontal" method="post">
	        		{{ csrf_field() }}
	        				           
		            <div class="form-group">
	                    <label for="inputName" class="col-sm-3 control-label">Название</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputName" name="name" value="{{ $name or '' }}">
		                </div>
		            </div>
		            <div class="form-group">
                   		<label for="inputSlug" class="col-sm-3 control-label">Slug</label>
                    	<div class="col-sm-9">
                    		<input type="text" id="inputSlug" name="slug" value="{{ $slug or '' }}">
		                </div>
		            </div>
		           	<div class="form-group">
	                    <label for="inputDescription" class="col-sm-3 control-label">Описание</label>
	                    <div class="col-sm-9">
		                	<input type="text" id="inputDescription" name="description" value="{{ $description or '' }}" >
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputImage" class="col-sm-3 control-label">Фото </label>
	                    <div class="col-sm-9">
		                	<input type="file" id="inputImage" name="image" value="{{ $image or '' }}" >
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputPrice" class="col-sm-3 control-label">Цена</label>
	                    <div class="col-sm-9">
		                	<input type="text" id="inputPrice" name="price" value="{{ $price or '' }}" >
		                </div>
		           	</div>
	           		<div class="form-group">
	                    <label for="inputCategory" class="col-sm-3 control-label">Категория</label>
	                    <div class="col-sm-9">
	                    	<select id="inputCategory" name="category_id">
	                    		@foreach ($categories as $category)
			                		<option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
			                	@endforeach
			                    <!-- <option value="2" {{ $product->category_id == 2 ? 'selected' : ''}}>Пирожные</option>
			                    <option value="3" {{ $product->category_id == 3 ? 'selected' : ''}}>Пироги</option>
			                    <option value="4" {{ $product->category_id == 4 ? 'selected' : ''}}>Десерты</option> -->
		                	</select>
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="is_active" class="col-sm-3 control-label">Активно?</label>
	                    <div class="col-sm-9">
	                    	<select id="is_active" name="is_active">
			                	<option value="1" {{ $is_active == 1 ? 'selected' : ''}}>Да </option>
			                    <option value="0" {{ $is_active == 0 ? 'selected' : ''}}>Нет</option>
			                </select>
		                </div>
		           	</div>
		           	<input class = "btn btn-primary btn-submit" type="submit" value="Сохранить">
        		</form>
        	</div>
        </div>
    </div>
</div>
