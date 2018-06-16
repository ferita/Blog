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