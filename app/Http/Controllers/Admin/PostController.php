<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\COntrollers\Controller;

class PostController extends Controller 
{
	public function index()
	{
		$posts = Post::orderby('id', 'DESC')
				->get();

		foreach ($posts as $post) {
			$post->url = route('site.posts.post', ['slug' => $post->slug]);
		}

		return $posts;
	}

	public function store (Request $request)
	{
		//
	}

	public function destroy($id)
	{
		Post::find($id)->delete();

		return ['result' => 'OK'];
	}
}