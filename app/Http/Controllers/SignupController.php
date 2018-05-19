<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\MySql;
session_start();

class SignupController extends Controller
{
    public function showSignupForm()
    {	
    	return view('layouts.secondary', [
    		'page' => 'pages.signup',
            'title' => 'Регистрация нового пользователя',
    		'msg' => 'Создайте логин и пароль']);
    }

    public function postSignupForm(Request $request)
    {
    	$inputData = $request->all(); // получаем массив введенных данных
    	$login = $request->input('login');
    	$password = $request->input('password');

    	//dump($inputData);
    	if ($login =='' || $password == '') {
    		return view('layouts.secondary', [
	    		'page' => 'pages.signup',
	    		'errorMessage' => 'Заполните все поля']);
    	}

    	 // добавить проверку на уникальность логина

    	else if(true) {
            return view('layouts.secondary', [
                'page' => 'pages.welcome',
                'login' => $login,
                'msg'=> 'Вы успешно зарегистрировались.']);
    	}
    }
}
