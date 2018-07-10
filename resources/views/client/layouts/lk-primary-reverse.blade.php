@extends('client.layouts.lk-two-column-reverse')

@section('left-column')
    <div class="sidebar boxed push-down-30">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
            	@include('widgets.lk-menu')
            	<div class="hidden-xs hidden-sm">
                	@include('widgets.na_zakaz')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('right-column')
    @include($page)
@endsection
