<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Includes\Classes\MyCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Includes\Interfaces\CounterInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
	protected $myCounter;

	public function __construct(CounterInterface $myCounter)
	{
		//$myCounter = resolve('AwesomeCounter');
		$this->myCounter = $myCounter;
	}

	public function index()
	{
		return view('client.layouts.primary', [
    		'page' => 'pages.main']);
	}
    public function test()
    {
    	$this->myCounter->increment();
    	$this->myCounter->increment();
    	$this->myCounter->increment();
    	$this->myCounter->decrement();
    	
    	$myCounter2 = resolve('AwesomeCounter');
    	$myCounter3 = resolve('AwesomeCounter');

    	dump($this->myCounter, $myCounter2, $myCounter3);
    	return $this->myCounter->getValue();
    }

    public function about()
    {
    	return view('client.layouts.primary', [
    		'page' => 'pages.about']);
    }
   
    public function contact()
    {
    	return view('client.layouts.primary', [
    		'page' => 'pages.feedback']);
    }

    public function elements()
    {
    	return view('client.layouts.secondary', [
    		'page' => 'pages.elements']);
    }

    public function post()
    {
    	return view('client.layouts.secondary', [
    		'page' => 'pages.post']);
    }

    public function search_results()
    {
    	return view('client.layouts.primary', [
    		'page' => 'pages.search-results']);
    }

    public function response404() 
    {
     	return response('<h1>404 Not Found</h1>', 404);
    }

    public function db()
    {
       /* $users = DB::table('users')->get()
            ->where('id', '2')
            ->Where('name', 'Vasiliy');
            ->select('name', 'email as user_email')
            ->get(['name', 'email']);
            ->count();
            ->exists();
        foreach ($users as $user) {
             echo $user->name . ' - ' .  $user->email, '<br>';
   		}
        DB::table('users')
            ->where('id', 2)
            ->update([
                'name' => 'Ivan Ivanov',
                'password' => 999999
            ]);
	    debug($users);
	    dump($users);
       */
    }

    public function relations()
    {
    	$content = '';
    	// $userModel = User::find(1);
    	// $userCustomer = $userModel->customer;
    	// dump($userModel, $userCustomer);

    	// $orders = Customer::find(1)->orders->first();
    	// dump($orders);

    	// $ordersByCustomer = Order::where('customer_id', '1')
    	// 	->get();
    	
    		

    	dump($route, $name);

    	return view('client.layouts.primary', [
    		'page' => 'pages.welcome',
    		'content' => $content

    	]);
    }
    public function getUser() 
    {
    	$user = Auth::user();
    }


   /*public function response1() {
    	return response('<h1>404 Not Found</h1>', 404)
	    	->header('Content-Type', 'text/plain')
	 		->header('X-Powered-By', 'Laravel 5.6')
			->cookie('mycookie', 'val', 60*24);;
    }
    */
}
