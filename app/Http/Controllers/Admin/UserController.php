<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller 

{
	public function index()
	{
        $this->authorize('view', User::class);

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
        $this->authorize('create', User::class);

        return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.user_create',
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
        $this->authorize('create', User::class);
     
    	/* $user = User::create([
    		'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status,
    	]); */
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->save();

        return redirect()->route('admin.users');
    }

	public function edit($id)
	{  
        $this->authorize('update', User::class);
		$user = User::find($id);

		if ($user === null) {
			abort(404);
		}

		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.user_edit',
            'user' => $user,
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'status' => $user->status
        ]); 
	}

	public function update (Request $request, $id)
    {   
        $this->authorize('update', User::class);
        $user = User::findOrFail($id); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->save();

        // User::findOrFail($id)
        //     ->update($request->except(['_token']));
            
        return redirect()->route('admin.users');
    }

	
	public function delete($id)
	{  
        $this->authorize('delete', User::class);
		try {
			$user = User::findOrFail($id);
		} catch (\Exception $e) {
			return "Пользователя с таким id не существует";
		}

		$user->delete();
		
		return redirect()->route('admin.users');
	}
}