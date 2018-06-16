<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\COntrollers\Controller;

class UserController extends Controller 

{
	public function index()
	{
		$users = User::orderby('id', 'ASC')
				->get();

		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.users',
            'users' => $users
        ]); 
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.user_edit',
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
    	$user = new User;
    	$user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
     // $user->status = $request->status;
        $user->save();

        return redirect()->route('admin.users');
    }

	public function edit($id)
	{
		$user = User::find($id);

		if ($user === null) {
			abort(404);
		}

		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.user_edit',
            'user' => $user,
            'name' => $user->name,
            'email' => $user->email,
        ]); 
	}

	public function update (Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
     // $user->status = $request->status;
        $user->save();

        return redirect()->route('admin.users');
    }

	
	public function delete($id)
	{
		User::find($id)->delete();

		return redirect()->route('admin.users');
	}
}