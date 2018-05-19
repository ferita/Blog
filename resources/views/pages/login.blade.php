<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
			<div class="boxed  push-down-45">
			    <div class="row">
			        <div class="col-xs-10  col-xs-offset-1  col-md-6  col-md-offset-3">
			        	<h3> Вход в  личный кабинет </h3>
			        	<div class="login">
				        	<form method="post">

					            {{ $errorMessage or $msg }}
					          	<br><br>
					            @csrf
					          	
					            <div class="">
					                Логин (email)<br>
					                <input type="text" name="login">
					            </div>
					            <div class="">
					                Пароль<br>
					                <input type="password" name="password">
					            </div>
					            <div class="checkbox">
					                <input type="checkbox" name="remember">
					                Запомнить меня <br>
					            </div>
					            <br>
					            <input class="btn btn-primary btn-submit" type="submit" value="Подтвердить">
					            <br>
					            <div>Новый пользователь? <a href="/signup">Зарегистрироваться</a></div>
					            				            					           
			        		</form>
			        	</div>
			        </div>
			    </div>
			</div>
		</div>
    </div>
</div>
