<div class="boxed  push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1  col-md-6  col-md-offset-3">
        	<h3>Редактирование поста</h3>
        	<div class="edit">
	        	<form method="post">
	        		{{ $errorMessage or $msg }}
	        		<br>
		             @csrf
		            <div class="">
		                Название<br>
		                <input type="text" name="title" value="{{ $post->title or ''}}">
		            </div>
		            <div class="">
		                Текст<br>
		                <textarea name="content" cols="60" rows="10">{{ $post->content or '' }}</textarea>
		            </div>    
		            <input class = "btn btn-primary btn-submit" type="submit" value="Сохранить">
		            <br>
        		</form>
        	</div>
        </div>
    </div>
</div>
