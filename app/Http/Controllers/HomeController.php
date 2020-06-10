<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $user=(auth()->user())? auth()->user()->following()->pluck('profiles.id'): [];
        $posts= Post::whereIn('user_id', $user)->latest()->paginate(12);
        return view('home',compact('posts'));
    }
}
