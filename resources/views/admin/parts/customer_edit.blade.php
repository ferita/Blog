<div class="edit boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Создание / Редактирование покупателя</h3>
        	<div class="edit">
	        	<form class="form-horizontal" method="post">
	        		{{ csrf_field() }}
	        				           
		            <div class="form-group">
	                    <label for="inputName" class="col-sm-3 control-label">Имя</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputName" name="name" value="{{ $name or '' }}">
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputSurname" class="col-sm-3 control-label">Фамилия</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputSurname" name="surname" value="{{ $surname or '' }}">
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputBirthdate" class="col-sm-3 control-label">Дата рождения</label>
	                    <div class="col-sm-9">
	                    	<input type="date" id="inputBirthdate" name="birthdate" value="{{ $birthdate or '' }}">
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputPhone" class="col-sm-3 control-label">Телефон</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputPhone" name="phone" value="{{ $phone or '' }}">
		                </div>
		            </div>
		           	
		            <input class = "btn btn-primary btn-submit" type="submit" value="Сохранить">
        		</form>
        	</div>
        </div>
    </div>
</div>
