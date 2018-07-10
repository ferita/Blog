<div class="edit boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Редактирование профиля</h3>
        	<div class="edit">
        		<div>
		            @if (session()->has('success_message'))
		                <div class="alert alert-success">
		                    {{ session()->get('success_message') }}
		                </div>
		            @endif
		        </div>
	        	<form class="form-horizontal" method="post">
	        		{{ csrf_field() }}
	        				           
		            <div class="form-group">
	                    <label for="inputName" class="col-sm-3 control-label">Имя</label>
	                    <div class="col-sm-9">
	                    	<input type="text" class="{{ $errors->has('name') ? 'redBorder' : '' }}" id="inputName" name="name" value="{{ $name or '' }}">
	                    	@if ($errors->has('name'))
		                		<div class="inputError">
		                			{{ $errors->first('name') }}
		                		</div>
		                	@endif
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputSurname" class="col-sm-3 control-label">Фамилия</label>
	                    <div class="col-sm-9">
	                    	<input type="text" class="{{ $errors->has('surname') ? 'redBorder' : '' }}" id="inputSurname" name="surname" value="{{ $surname or '' }}">
	                    	@if ($errors->has('surname'))
		                		<div class="inputError">
		                			{{ $errors->first('surname') }}
		                		</div>
		                	@endif
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputBirthdate" class="col-sm-3 control-label">Дата рождения</label>
	                    <div class="col-sm-9">
	                    	<input type="date" class="{{ $errors->has('birthdate') ? 'redBorder' : '' }}" id="inputBirthdate" name="birthdate" value="{{ $birthdate or '' }}">
	                    	@if ($errors->has('birthdate'))
		                		<div class="inputError">
		                			{{ $errors->first('birthdate') }}
		                		</div>
		                	@endif
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputPhone" class="col-sm-3 control-label">Телефон</label>
	                    <div class="col-sm-9">
	                    	<input type="text" class="{{ $errors->has('phone') ? 'redBorder' : '' }}" id="inputPhone" name="phone" value="{{ $phone or '' }}">
		                </div>
		            </div>
		           	
		            <input class = "btn btn-primary btn-submit" type="submit" value="Сохранить">
        		</form>
        	</div>
        </div>
    </div>
</div>
