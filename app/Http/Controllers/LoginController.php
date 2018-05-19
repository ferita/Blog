<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\MySql;
session_start();

class LoginController extends Controller
{
    public function showLoginForm()
    {	
    	return view('layouts.secondary', [
    		'page' => 'pages.login',
            'title' => 'Вход',
    		'msg' => 'Введите логин и пароль']);
    }

    public function postLoginForm(Request $request)
    {
    	$inputData = $request->all(); // получаем массив введенных данных
    	$login = $request->input('login');
    	$password = $request->input('password');

    	//dump($inputData);
    	if ($login =='' || $password == '') {
    		return view('layouts.secondary', [
	    		'page' => 'pages.login',
	    		'errorMessage' => 'Заполните все поля']);
    	}
    	 
    	else if(true) {
    		return view('layouts.secondary', [
                'page' => 'pages.welcome',
                'login' => $login,
                'msg'=> 'Вы успешно авторизованы.']);
    	}
    	else {
    		return view('layouts.secondary', [
	    		'page' => 'pages.login',
	    		'errorMessage' => 'Неправильный логин или пароль']);
    	}
    	//abort(403); // access denied
    }
}
