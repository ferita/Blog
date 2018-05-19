<div class="boxed  push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1  col-md-6  col-md-offset-3">
        	<h3>Регистрация нового пользователя</h3>
        	<div class="signup">
	        	<form method="post">
	        		{{ $errorMessage or $msg }}
	        		<br><br>
		            @csrf
		            <div class="">
		                Логин (email)<br>
		                <input type="text" name="login" placeholder='user@example.com'>
		            </div>
		            <div class="">
		                Пароль<br>
		                <input type="password" name="password" placeholder='Минимум 8 символов'>
		            </div>    
		           		           
		            <div class="checkbox">
		                <input type="checkbox" name="agree">
		                Согласен на хранение и обработку персональных данных 
		            </div>
		            <br>
		            <input class = "btn btn-primary btn-submit" type="submit" value="Зарегистрироваться">
		            <br>
		           
		            <div>Уже зарегистрированы? <a href="/login">Войти</a></div>
		            <br>
        		</form>
        	</div>
        </div>
    </div>
</div>
