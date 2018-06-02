<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectAfterLogout = '/login';


    public function showLoginForm()
    {	
    	return view('client.layouts.secondary', [
    		'page' => 'auth.login',
            'title' => 'Вход']);
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',  
            'password' => 'required|max:32|min:8',
        ]);  

    	$credentials = $request->only('email', 'password');
        $remember = $request->only('remember');
       
        // $user = Auth::user(); Не работает, дает NULL 
        // dump($user);

        if (Auth::attempt($credentials, $remember)) {
            // Authentication passed...
            return view('client.layouts.secondary', [
                'page' => 'pages.welcome',
                'name' => $request->user()->name,
                'msg'=> 'Вы успешно авторизованы.'
            ]); 
        }
       
        return back()->withErrors(['Ошибка авторизации'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
