<div class="edit boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Редактирование заказа</h3>
        	<div class="edit">
	        	<form class="form-horizontal" method="post">
	        		{{ csrf_field() }}
	        		<input type="hidden" name="customer_id" value="{{ $customer->id }}">    
		            <div class="form-group">
	                    <label for="inputName" class="col-sm-3 control-label">Клиент</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputName" name="client" value="{{ $customer->name . ' ' . $customer->surname }}" disabled>
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputPhone" class="col-sm-3 control-label">Телефон</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputPhone" name="phone" value="{{ $customer->phone or '' }}">
		                </div>
		            </div>
		            <div class="form-group">
                   		<label for="inputEmail" class="col-sm-3 control-label">E-mail</label>
                    	<div class="col-sm-9">
                    		<input type="email" id="inputEmail" name="email" value="{{ $email or '' }}" disabled>
		                </div>
		            </div>
		           	<div class="form-group">
	                    <label for="inputAddress" class="col-sm-3 control-label">Адрес доставки</label>
	                    <div class="col-sm-9">
		                	<input type="text" id="inputAddress" name="address" value="{{ $order->address or '' }}">
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputAmount" class="col-sm-3 control-label">Сумма заказа</label>
	                    <div class="col-sm-9">
		                	<input type="text" id="inputAmount" name="amount" value="{{ $order->order_amount or '' }}">
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputProducts" class="col-sm-3 control-label">Позиции</label>
	                    <div class="col-sm-9">
	                    	<ul>
	                    		<li>
	                    			
	                    		</li>
	                    	</ul>
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputShipdate" class="col-sm-3 control-label">Дата доставки</label>
	                    <div class="col-sm-9">
		                	<input type="date" id="inputShipdate" name="shipdate" value="{{ $order->shipdate or '' }}">
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputPaid" class="col-sm-3 control-label">Оплачен?</label>
	                    <div class="col-sm-9">
	                    	<select id="inputPaid" name="is_paid">
			                	<option value="1">Да </option>
			                    <option value="0">Нет</option>
		                	</select>
		                </div>
		           	</div>
		           	<div class="form-group">
	                    <label for="inputShipped" class="col-sm-3 control-label">Доставлен?</label>
	                    <div class="col-sm-9">
	                    	<select id="inputShipped" name="is_shipped">
			                	<option value="1">Да </option>
			                    <option value="0">Нет </option>
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
