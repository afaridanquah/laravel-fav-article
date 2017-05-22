<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    public function index()
    {
    	$post = Post::paginate(5);
    	return view('post.index',compact('post'));
    }

    public function favoritePost(Post $post)
    {
    	Auth::user()->favorites()->attach($post->id);
    	return back();
    }
    public function unFavoritePost(Post $post)
    {
    	Auth::user()->favorites()->detach($post->id);
    	return back();
    }
}
