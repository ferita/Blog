<div class="signup boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Регистрация нового пользователя</h3>
        	<div class="signup">
	        	<form class="form-horizontal" method="post">
	        		{{ csrf_field() }}
	        				           
		            <div class="form-group">
	                    <label for="inputName" class="col-sm-3 control-label">Имя/Логин</label>
	                    <div class="col-sm-9">
	                    	@php 
		                    	if($errors->has('name')) {
			                		$class = "redBorder";
		                    	} else {
									$class = "";
		                    	}
		                	@endphp
		                	<input type="text" class = "{{ $class }}" id="inputName" name="name" placeholder='Не менее трех символов*' value="{{ old('name', '') }}">
		                	@if ($errors->has('name'))
		                		<div class="inputError">
		                			{{ $errors->first('name') }}
		                		</div>
		                	@endif
		                </div>
		            </div>
		            <div class="form-group">
                   		<label for="inputEmail" class="col-sm-3 control-label">E-mail</label>
                    	<div class="col-sm-9">
                    		@php 
		                    	if($errors->has('email')) {
			                		$class = "redBorder";
		                    	} else {
									$class = "";
		                    	}
		                	@endphp
		                	<input type="email" class = "{{ $class }}" id="inputEmail" name="email" placeholder='user@example.com*' value="{{ old('email', '') }}">
		                	@if ($errors->has('email'))
		                		<div class="inputError">
		                			{{ $errors->first('email') }}
		                		</div>
		                	@endif
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputPassword" class="col-sm-3 control-label">Пароль</label>
	                    <div class="col-sm-9">
	                    	@php 
		                    	if($errors->has('password')) {
			                		$class = "redBorder";
		                    	} else {
									$class = "";
		                    	}
		                	@endphp
		                	<input type="password" class = "{{ $class }}" id="inputPassword" name="password" placeholder='Не менее восьми символов*'>
		                	@if ($errors->has('password'))
		                		<div class="inputError">
		                			{{ $errors->first('password') }}
		                		</div>
		                	@endif
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputPassword2" class="col-sm-3 control-label">Пароль</label>
	                    <div class="col-sm-9">
	                    	@php 
		                    	if($errors->has('password2')) {
			                		$class = "redBorder";
		                    	} else {
									$class = "";
		                    	}
		                	@endphp
		               		<input type="password" class = "{{ $class }}" id="inputPassword2" name="password2" placeholder="Повторите пароль*">
		               		@if ($errors->has('password2'))
		                		<div class="inputError">
		                			{{ $errors->first('password2') }}
		                		</div>
		                	@endif
		               	</div>
		            </div>
		            <div class="form-group">
                    	<label for="inputPhone" class="col-sm-3 control-label"> Телефон</label>
                    	<div class="col-sm-9">
                    		@php 
		                    	if($errors->has('phone')) {
			                		$class = "redBorder";
		                    	} else {
									$class = "";
		                    	}
		                	@endphp
		                  	<input type="phone" class = "{{ $class }}" id="inputPhone" name="phone" placeholder='+7 (999) 999-99-99' value="{{ old('phone', '') }}">
		                  	@if ($errors->has('phone'))
		                  		<div class="inputError">
		                			{{ $errors->first('phone') }}
		                		</div>
		                	@endif
		                </div>
		            </div>    
		           	<div class="form-group">
                   		<div class="col-sm-offset-3 col-sm-6">	           
		           			<div class="checkbox">
		                		<input type="checkbox" name="agree">Согласен на хранение и обработку персональных данных
		                	</div>
		                	@if ($errors->has('agree'))
		                		<div class="has-error">
		                			{{ $errors->first('agree') }}
		                		</div>
		                	@endif
		                </div>
		            </div>
		           
		            <input class = "btn btn-primary btn-submit" type="submit" value="Зарегистрироваться">
		            		           
		            <div>Уже зарегистрированы? <a href="/login">Войти</a></div>
		            
        		</form>
        	</div>
        </div>
    </div>
</div>
