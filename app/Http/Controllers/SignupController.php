<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function showSignupForm()
    {	
    	return view('client.layouts.secondary', [
    		'page' => 'pages.signup',
            'title' => 'Регистрация нового пользователя',
    		'msg' => 'Создайте логин и пароль']);
    }

    public function postSignupForm(RegisterRequest $request)
    {
        $input = $request->all();

        $id = DB::table('users')->insertGetId([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            //'phone' => $input['phone']
        ]);

        if ($id ) {
            Auth::loginUsingId($id, true); // чтобы сразу авторизовать нового пользователя
        }
       	return view('client.layouts.secondary', [
            'page' => 'pages.welcome',
            'name' => $input['name'],
            'msg'=> 'Вы успешно зарегистрировались.'
        ]);
    }
}
