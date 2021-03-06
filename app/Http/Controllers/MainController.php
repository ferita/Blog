<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Includes\Classes\MyCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Includes\Interfaces\CounterInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use App\Events\FeedbackWasCreated;


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
		$categories = Category::all();

		return view('client.layouts.primary-reverse', [
    		'page' => 'pages.main',
    		'categories'=> $categories
    	]);
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

    public function contacts()
    {
    	return view('client.layouts.secondary', [
    		'page' => 'pages.contacts']);
    }
   
    public function search_results()
    {
    	return view('client.layouts.primary', [
    		'page' => 'pages.search-results']);
    }
    public function elements()
    {
    	return view('client.layouts.secondary', [
    		'page' => 'pages.elements']);
    }

    public function response404() 
    {
     	return response('<h1>404 Not Found</h1>', 404);
    }

   public function feedback()
    {
    	$categories = Category::all();
        $products = Product::orderby('id', 'DESC')
                ->take(3)
                ->get();

        return view('client.layouts.primary', [
            'page' => 'pages.feedback',
            'title' => 'Обратная связь',
            'activeMenu' => 'feedback',
            'categories' => $categories,
            'products'=> $products
        ]);
    }
    public function feedbackPost(Request $request)
    {
    	$categories = Category::all();
        $products = Product::orderby('id', 'DESC')
                ->take(3)
                ->get();
        $this->validate($request, [
            'name' => 'required|max:50|min:2',
            'email' => 'required|max:255|email',
            'message' => 'required|max:10240|min:10',
            'categories' => $categories
        ]);

        event(
            new FeedbackWasCreated($request->all())
        );

        // Mail::raw($request->input('message'), function($message) {
        // 	$message->from('novinatt@yandex.ru');
        // 	$message->to('doremifasolas@yandex.ru');
        // 	//$message->setContentType('text/html');
        // 	$message->subject('Письмо с сайта');
        // });
        // Mail::to(env('MAIL_TO')) // может принимать User::find($id) или нескольких
        // 	->cc('novinatt@yandex.ru') // копия кому-либо
        //     ->send(new FeedbackMail($request->all()));
        return view('client.layouts.primary', [
            'page' => 'parts.blank',
            'title' => 'Сообщение отправлено.',
            'content' => 'Спасибо за ваше сообщение!',
            'link' => '<a href="javascript:history.back()">Вернуться назад</a>',
            'activeMenu' => 'feedback',
            'categories' => $categories,
            'products'=> $products
        ]);
    }

    public function db()
    {
      
    }
}