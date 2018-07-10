<div class="signup boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Оформление заказа</h3>
        	<div class="order">
        		@php
        			$user = Auth::user();
       				$customer = $user->customer;
       				      				
        		@endphp
	        	<form class="form-horizontal" method="post">
	        		{{ csrf_field() }}
	        		@if (!$customer)		           
			            <div class="form-group">
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
		                    <label for="inputSurname" class="col-sm-3 control-label">Фамилия</label>
		                    <div class="col-sm-9">
		                    	<input type="text" class = "{{ $errors->has('surname') ? 'redBorder' : '' }}" id="inputSurname" name="surname" placeholder='Не менее трех символов*' value="{{ old('surname', '') }}">
			                	@if ($errors->has('surname'))
			                		<div class="inputError">
			                			{{ $errors->first('surname') }}
			                		</div>
			                	@endif
			                </div>
			            </div>
		            @endif

		            <div class="form-group">
	                    <label for="inputDate" class="col-sm-3 control-label">К какой дате испечь?</label>
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
		            @if ($customer) 
			            <input type="hidden" name="name" value="{{ $customer->name or ''}}">
			            <input type="hidden" name="surname" value="{{ $customer->surname or ''}}">
			            <input type="hidden" name="customer_email" value="{{ $customer->user->email or '' }}">
			        @endif
		            <input class = "btn btn-primary btn-submit" type="submit" value="Подтвердить заказ">
        		</form>
        	</div>
        </div>
    </div>
</div>
