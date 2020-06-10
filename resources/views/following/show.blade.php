@extends('layouts.app')


@section('content')
<div class="container">

    <div class="col-md-4">
</div>
        <div class="row d-flex align-items-md-baseline">

            <div class="col-md-2">
                <a href="{{ route('profile.show',$user->profile->id) }}">
                    <img src="{{ $user->profile->image?'/storage/'.$user->profile->image:asset('img/pic2.jpg')  }}" class="rounded-circle w-100 p-4">

                </a>

            </div>
            <div class="col d-flex align-items-md-baseline">
                <a href="{{ route('profile.show',$user->profile->id) }}">
                    <strong class="font-weight-bold h5">{{ $user->username }}</strong>
                </a>
                <div>
                    <input type="hidden" name="userId" id="userId" value="{{ $user->id }}">
                    <button class="btn text-secondary" id="follow"  onclick="followHandle(this)" value="{{ $follow }}" onchange="followChange(this)">follow</button>
                </div>

            </div>


        </div>
        <div class="row">
            <div class="col">

                <ul class="">
                    @foreach($user->following as $profile)
                        <div class="list-group ">

                            <li class="list-group-item list-unstyled w-100  d-flex justify-content-between"><span>
                                    <a href="{{ route('profile.show',$profile->user_id) }}">{{ $profile->user->username }}</a></span> <span>{{ random_int(1,60) }} minuts Ago | Active</span></li>
                        </div>


                    @endforeach

                </ul>
            </div>
        </div>

    </div>


@endsection