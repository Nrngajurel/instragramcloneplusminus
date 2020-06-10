<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct()
    {
        //  $this->middleare('auth')->only(['store']);
    }

    public function store($id)
    {
        $user= User::findOrFail($id);
        return auth()->user()->following()->toggle($user->profile);
    }

    public function followings($id)
    {
        $user= User::findOrFail($id);
        $follow= (auth()->user())?auth()->user()->following->contains($user->profile):false;

        return view('following.show', compact('user','follow'));
    }
    public function followers($id)
    {
        $user= User::findOrFail($id);
        $follow= (auth()->user())?auth()->user()->following->contains($user->profile):false;
        return view('followers.show',compact('user','follow'));
    }

}
