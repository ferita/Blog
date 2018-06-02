@extends('client.layouts.base')

@section('header')
    @include('parts.header')
@endsection

@section('search_panel')
    @include('parts.search-panel')
@endsection

@section('content')
    <div class="container">
        @section('center-column')
        @show
    </div>
@endsection

@section('footer_links')
    @include('parts.footer-links')
@endsection

@section('footer_copyright')
    @include('parts.footer-copyrights')
@endsection
