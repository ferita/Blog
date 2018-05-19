@extends('layouts.base')

@section('header')
    @include('parts.header')
@endsection

@section('content')
    <div class="container">
        @section('center-column')
        	<h2>Список пользователей</h2>
    		<table class="table  table-hover">
                <thead>
                <tr class="su-even">
                    <th>User ID</th>
                    <th>Login</th>
                    <th>Name</th>
                </tr>
                </thead>
				<tbody>
    			@php
    				//для теста вывода таблицы
    			
	    			$user = new stdClass();
	    			$user->user_id = '1';
	    			$user->login = 'User Login';
	    			$user->name = 'User Name';
	    			$users = [$user, $user, $user];
    			@endphp

    			@forelse($users as $user)
    			 
                    <tr>
                        <td> {{ $user->user_id }} </td>
                        <td> {{ $user->login }} </td>
                        <td> {{ $user->name }} </td>
                    </tr>
                @empty
                	Нет пользователей
                @endforelse
                </tbody>
            </table>
        @show
    </div>
@endsection

@section('footer_links')
    @include('parts.footer-links')
@endsection

@section('footer_copyright')
    @include('parts.footer-copyrights')
@endsection
