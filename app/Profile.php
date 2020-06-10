<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable= ['title','image','description','url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function followers()
    {
       return $this->belongsToMany(User::class,'profile_user');
    }
}
