@extends('client.layouts.base')

@section('header')
    @include('parts.header')
@endsection

@section('content')
    <div class="container">
        @section('center-column')
        	<h2>Здравствуйте, {{ $name }} !</h2>
        	<p>{{ $msg or '' }}</p>
        	<br>
        @show
    </div>
@endsection

@section('footer_links')
    @include('parts.footer-links')
@endsection

@section('footer_copyright')
    @include('parts.footer-copyrights')
@endsection
