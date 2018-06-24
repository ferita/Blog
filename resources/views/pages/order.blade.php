<div class="signup boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Оформление заказа</h3>
        	<div class="signup">
	        	<form class="form-horizontal" method="post">
	        		{{ csrf_field() }}
	        				           
		            <div class="form-group">
		            	<input type="hidden" name="customer_id" value="{{ $customer->id }}">
	                    <label for="inputName" class="col-sm-3 control-label">Имя</label>
	                    <div class="col-sm-9">
	                    	<input type="text" class = "{{ $errors->has('name') ? 'redBorder' : '' }}" id="inputName" name="name" placeholder='Не менее трех символов*' value="{{ old('name', '') }}">
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
	                    <label for="inputPhone" class="col-sm-3 control-label">Телефон</label>
	                    <div class="col-sm-9">
	                    	<input type="text" class = "{{ $errors->has('phone') ? 'redBorder' : '' }}" id="inputPhone" name="phone" placeholder='7-900-000-00-00' value="{{ old('phone', '') }}">
		                	@if ($errors->has('phone'))
		                		<div class="inputError">
		                			{{ $errors->first('phone') }}
		                		</div>
		                	@endif
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputDate" class="col-sm-3 control-label">К какой дате испечь торт?</label>
	                    <div class="col-sm-9">
	                    	<input type="date" class = "{{ $errors->has('shipdate') ? 'redBorder' : '' }}" id="inputDate" name="shipdate" value="{{ old('shipdate', '') }}">
		                	@if ($errors->has('shipdate'))
		                		<div class="inputError">
		                			{{ $errors->first('shipdate') }}
		                		</div>
		                	@endif
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputAddress" class="col-sm-3 control-label">Адрес доставки</label>
	                    <div class="col-sm-9">
	                    	<input type="text" class = "{{ $errors->has('address') ? 'redBorder' : '' }}" id="inputAddress" name="address" placeholder="Если доставка не нужна, оставьте пустым" value="{{ old('address', '') }}">
		                	@if ($errors->has('address'))
		                		<div class="inputError">
		                			{{ $errors->first('address') }}
		                		</div>
		                	@endif
		                </div>
		            </div>
		            <input class = "btn btn-primary btn-submit" type="submit" value="Подтвердить заказ">
        		</form>
        	</div>
        </div>
    </div>
</div>
