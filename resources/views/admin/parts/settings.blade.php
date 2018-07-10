<div class="edit boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
        	<h3>Настройки сайта</h3>
        	<div class="edit">
        		<div>
	                @if (session()->has('success_message'))
	                    <div class="alert alert-success">
	                        {{ session()->get('success_message') }}
	                    </div>
	                @endif
           		</div>
	        	<form class="form-horizontal" method="post">
	        		{{ csrf_field() }}
	        				           
		            <div class="form-group">
	                    <label for="inputName" class="col-sm-3 control-label">Название сайта</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputName" name="site_name" value="{{ $site_name or '' }}">
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputCompanyName" class="col-sm-3 control-label">Название компании</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputCompanyName" name="company_name" value="{{ $company_name or '' }}">
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputDescription" class="col-sm-3 control-label">Краткое описание</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputDescription" name="company_description" value="{{ $company_description or '' }}">
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputAddress" class="col-sm-3 control-label">Адрес</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputAddress" name="company_address" value="{{ $company_address or '' }}">
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputPhone" class="col-sm-3 control-label">Телефон компании</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputPhone" name="company_phone" value="{{ $company_phone or '' }}">
		                </div>
		            </div>
		             <div class="form-group">
	                    <label for="inputEmail" class="col-sm-3 control-label">E-mail компании</label>
	                    <div class="col-sm-9">
	                    	<input type="email" id="inputEmail" name="company_email" value="{{ $company_email or '' }}">
		                </div>
		            </div>
		             <div class="form-group">
	                    <label for="inputEmailManager" class="col-sm-3 control-label">E-mail менеджера</label>
	                    <div class="col-sm-9">
	                    	<input type="email" id="inputEmailManager" name="manager_email" value="{{ $manager_email or '' }}">
		                </div>
		            </div>
		            <div class="form-group">
	                    <label for="inputURL" class="col-sm-3 control-label">URL сайта</label>
	                    <div class="col-sm-9">
	                    	<input type="text" id="inputURL" name="site_url" value="{{ $site_url or '' }}">
		                </div>
		            </div>
		           	
		            <input class = "btn btn-primary btn-submit" type="submit" value="Сохранить">
		            <input class = "btn btn-primary btn-submit" type="reset" value="Отменить">
        		</form>
        	</div>
        </div>
    </div>
</div>
