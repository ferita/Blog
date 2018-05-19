@extends('layouts.base')

@section('header')
    @include('parts.header')
@endsection

@section('content')
    <div class="container">
        @section('center-column')
        	<h1>Hello, admin</h1>
        @show
    </div>
@endsection

@section('footer_links')
    @include('parts.footer-links')
@endsection

@section('footer_copyright')
    @include('parts.footer-copyrights')
@endsection
