@extends('admin.layouts.base')

@section('header')
    @include('parts.lk-header')
@endsection

@section('search_panel')
    @include('parts.search-panel')
@endsection

@section('content')
    <div class="container container_lk">
        <div class="row">
            <div class="col-xs-12 col-md-3">
                @section('left-column')
                @show
            </div>
             <div class="col-xs-12 col-md-9">
                @section('right-column')
                @show
            </div>
        </div>
    </div>
@endsection

@section('footer_links')
    @include('parts.footer-links')
@endsection

@section('footer_copyright')
    @include('parts.footer-copyrights')
@endsection