<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
			<div class="login boxed push-down-45">
			    <div class="row">
			        <div class="col-xs-10  col-xs-offset-1">
			        	<h3> Вход в  личный кабинет </h3>
			        	<div class="">
				        	<form class="form-horizontal" method="post">

					            @if($errors->any())
									<p class="has-error">{{ $errors->first() }}<p>
								@endif
					          	<br>
					            @csrf
					          	
					          	<div class="form-group">
				                    <label for="inputEmail" class="col-sm-3 control-label">Email</label>
				                    <div class="col-sm-9">
					                    <input type="text" name="email" id="inputEmail" value="{{ old('email', '') }}">
					                    @if ($errors->has('email'))
					                		<div class="inputError">
					                			{{ $errors->first('email') }}
					                		</div>
					                	@endif
					            	</div>
					            </div>
					            <div class="form-group">
				                    <label for="inputPass" class="col-sm-3 control-label">Пароль</label>
				                    <div class="col-sm-9">
					                	<input type="password" name="password" id="inputPass">
					                	@if ($errors->has('password'))
					                		<div class="inputError">
					                			{{ $errors->first('password') }}
					                		</div>
					                	@endif
					                </div>
					            </div>
					            <div class="form-group">
                    				<div class="col-sm-offset-3 col-sm-3">
                    					<div class="checkbox">
                    						<label>
					                		<input type="checkbox" name="remember">Запомнить меня</label>
					                	</div>
					                </div>
					            </div>
					            <div class="form-group">
                    				<div class="col-sm-offset-1 col-sm-10">
					            		<input class="btn btn-primary btn-submit" type="submit" value="Подтвердить">
					            	</div>
					            </div>
					            <div class="form-group">
                    				<div class="col-sm-offset-1 col-sm-10">
					            		<div>Новый пользователь? <a href="/signup">Зарегистрироваться</a></div>
					            	</div>
					            </div>			            					           
			        		</form>
			        	</div>
			        </div>
			    </div>
			</div>
		</div>
    </div>
</div>
