<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    public function postBySlug($slug)
    {
        try {
            $post = Post::where('slug', $slug)
                ->active()
                ->intime()
                ->firstOrFail();

        } catch (\Exception $e){
            abort(404);
        }

        return  view('layouts-secondary', [
            'page' => 'pages.post',
            'title' => $post->title,
            'post' => $post
        ]);

    }
    
    public function listByTag($tag) 
    {
        try {
            $tag = Tag::where('name', $tag)
                ->firstOrFail();

        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function showCreateForm()
    {
        return view('layouts.secondary', [
            'page' => 'pages.create',
            'title' => 'Новый пост',
            'msg' => ''
           ]);
    }

    public function create()
    {
        
    }

    public function showEditForm($id)
    {
        return view('layouts.secondary', [
            'page' => 'pages.edit',
            'title' => 'Редактирование поста',
            'msg' => ''
           ]);
    }

    public function edit($id)
    {
        
    }

     public function delete($id)
    {
        
    }


}
