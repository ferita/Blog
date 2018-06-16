<div class="edit boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Создание / Редактирование пользователя</h3>
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
                   		<label for="inputEmail" class="col-sm-3 control-label">E-mail</label>
                    	<div class="col-sm-9">
                    		<input type="email" id="inputEmail" name="email" value="{{ $email or '' }}">
		                </div>
		            </div>
		           	<div class="form-group">
	                    <label for="inputPassword" class="col-sm-3 control-label">Пароль</label>
	                    <div class="col-sm-9">
		                	<input type="password" id="inputPassword" name="password">
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputStatus" class="col-sm-3 control-label">Статус</label>
	                    <div class="col-sm-9">
	                    	<select id="inputStatus" name="status">
			                	<option value="user">Пользователь</option>
			                    <option value="manager">Менеджер</option>
			                    <option value="admin">Админ</option>
		                	</select>
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputBan" class="col-sm-3 control-label">Бан</label>
	                    <div class="col-sm-9">
		                	<select id="inputBan" name="ban">
			                	<option value="ban">Забанить</option>
			                    <option value="unban">Разбанить</option>
			                </select>
		                </div>
		           	</div>
		            <input class = "btn btn-primary btn-submit" type="submit" value="Сохранить">
        		</form>
        	</div>
        </div>
    </div>
</div>
