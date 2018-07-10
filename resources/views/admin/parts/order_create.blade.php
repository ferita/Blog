<div class="edit boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Создание заказа</h3>
        	<div class="order">
	        	<form class="form-horizontal" method="post">
	        		{{ csrf_field() }}
	        		
		            <div class="form-group">
		                    <label for="inputName" class="col-sm-3 control-label">Имя*</label>
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
		                    <label for="inputSurname" class="col-sm-3 control-label">Фамилия*</label>
		                    <div class="col-sm-9">
		                    	<input type="text" class = "{{ $errors->has('surname') ? 'redBorder' : '' }}" id="inputSurname" name="surname" placeholder='Не менее трех символов*' value="{{ old('surname', '') }}">
			                	@if ($errors->has('surname'))
			                		<div class="inputError">
			                			{{ $errors->first('surname') }}
			                		</div>
			                	@endif
			                </div>
			            </div>
					
				        <div class="form-group">
	                   		<label for="inputEmail" class="col-sm-3 control-label">E-mail*</label>
	                    	<div class="col-sm-9">
	                    		<div>
	                    		<select id="inputEmail" name="email" class="{{ $errors->has('email') ? 'redBorder' : '' }}">
			                    	@foreach ($users as $user)
					                	<option value="{{ $user->email }}" name = "email">{{old('email', "$user->email")}}</option>
					                @endforeach
				                </select>
				                </div>
			                </div>
			                @if ($errors->has('email'))
		                		<div class="inputError">
		                			{{ $errors->first('email') }}
		                		</div>
			                @endif
			            </div>
		           
		           	<div class="form-group">
	                    <label for="inputProducts" class="col-sm-3 control-label">Позиции*</label>
	                    <div class="col-sm-9 multiselect">
	                    <select id="inputProducts" name="products[]" class="{{ $errors->has('products[]') ? 'redBorder' : ''}}" size="10" multiple>
	                    	@foreach ($products as $product)
			                	<option value="{{ $product->id }}" name="products[]">{{ $product->name . ' - ' . $product->price . ' руб.'}}</option>
			                @endforeach
		                </select>
		                @if ($errors->has('products[]'))
	                		<div class="inputError">
	                			{{ $errors->first('products[]') }}
	                			{{ $product->id }}
	                		</div>
		                @endif
		            	</div>
		           	</div>
		           	<!-- <div class="form-group">
	                    <label for="inputAmount" class="col-sm-3 control-label">Сумма заказа*</label>
	                    <div class="col-sm-9">
		                	<input type="text" id="inputAmount" name="amount"  class="{{ $errors->has('amount') ? 'redBorder' : ''}}" value="{{ old('amount', '') }}">
		                	@if ($errors->has('amount'))
		                		<div class="inputError">
		                			{{ $errors->first('amount') }}
		                		</div>
		                	@endif
		                </div>
		           	</div> -->
		           	<div class="form-group">
	                    <label for="inputShipdate" class="col-sm-3 control-label">К какой дате испечь?*</label>
	                    <div class="col-sm-9">
		                	<input type="date" id="inputShipdate" name="shipdate" class="{{ $errors->has('shipdate') ? 'redBorder' : ''}}" value="{{ old('shipdate', '') }}">
		                	@if ($errors->has('shipdate'))
		                		<div class="inputError">
		                			{{ $errors->first('shipdate') }}
		                		</div>
		                	@endif
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputPhone" class="col-sm-3 control-label">Телефон</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputPhone" name="phone" value="{{ old('phone', '') }}">
		                </div>
		            </div>
		           
		           	<div class="form-group">
	                    <label for="inputAddress" class="col-sm-3 control-label">Адрес доставки</label>
	                    <div class="col-sm-9">
		                	<input type="text" id="inputAddress" name="address" value="{{ old('address', '') }}" placeholder="Если доставка не нужна, оставьте пустым" >
		                </div>
		           	</div>
		           
		           	<div class="form-group">
	                    <label for="inputPaid" class="col-sm-3 control-label">Оплачен?</label>
	                    <div class="col-sm-9">
	                    	<select id="inputPaid" name="is_paid">
			                	<option value="1">Да </option>
			                    <option value="0" selected> Нет</option>
		                	</select>
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputShipped" class="col-sm-3 control-label">Доставлен?</label>
	                    <div class="col-sm-9">
	                    	<select id="inputShipped" name="is_shipped">
			                	<option value="1">Да </option>
			                    <option value="0" selected> Нет </option>
		                	</select>
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputStatus" class="col-sm-3 control-label">Статус</label>
	                    <div class="col-sm-9">
	                    	<select id="inputStatus" name="is_active">
			                	<option value="1">Активен</option>
			                    <option value="0">Исполнен</option>
			                    <option value="2">Отменен</option>
		                	</select>
		                </div>
		           	</div>
		            <input class = "btn btn-primary btn-submit" type="submit" value="Сохранить">
        		</form>
        	</div>
        </div>
    </div>
</div>
