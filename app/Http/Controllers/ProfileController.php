<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
    }

    public function show(Request $request, $user)
    {

        $user = User::with('profile','posts')->findOrFail($user);
        $follow= (auth()->user())?auth()->user()->following->contains($user->profile):false;
        return view('profile.show', compact('user','follow'));
    }

    public function edit(Profile $profile,$id)
    {
        $profile= Profile::with('user')->findOrFail($id);

        $this->authorize('update', $profile);
        $profile= Profile::findOrFail($id);
       return view('profile.edit',compact('profile'));
    }

    public function update($id)
    {
        $profile= Profile::with('user')->findOrFail($id);
        $this->authorize('update', $profile);
        $data= request()->validate([
           'title'=>'required',
            'description'=>'',
            'url'=>'url',
        ]);
        if(request('image')){
            $data= request()->validate([
                'image'=>'image',
            ]);
            $image_path= request('image')->store('uploads/profile','public');
            Image::make(public_path("/storage/{$image_path}"))->fit(1200,1200)->save();
            $image_path= ['image'=>$image_path];

        }

//        dd($image);
        auth()->user()->profile->update(
            array_merge($data, $image_path??[])
        );
        return redirect()->route('profile.show',auth()->user()->id);

    }
}
