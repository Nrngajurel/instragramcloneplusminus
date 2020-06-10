@extends('layouts.app')
@section('title',$user->username)
@section('content')
    <div class="container" >
        <div class="row" id="app">
            <div class="col-3 p-5">
                <a href="{{ route('profile.show', $user->id) }}">
                    <img src="{{ $user->profile->image?'/storage/'.$user->profile->image:asset('img/pic2.jpg')  }}" class="w-100 rounded-circle" alt="profile picture">
                </a>
            </div>
            <div class="col-9 pt-5">
                <div class="row">
                    <div class="col d-flex justify-content-between">
                        <div>

                            <h1>
                                <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none ">
                                    {{ $user->username }}
                                </a>
                            </h1>
                            <div>
                                <input type="hidden" name="userId" id="userId" value="{{ $user->id }}">
                                <button class="btn btn-primary" id="follow"  onclick="followHandle(this)" value="{{ $follow }}" onchange="followChange(this)">follow</button>
                            </div>
                        </div>
                        @can('update', $user->profile)
                            <a href="{{ route('post.create') }}"> Add New Post</a>
                        @endcan
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                        <div class="d-flex">
                            <div class="pr-5">


                                    <strong class="pr-1">{{ $user->posts()->count() }}</strong>posts

                            </div>
                            <div class="pr-5">
                                <a href="{{ route('follow.followers', $user->id) }}">
                                    <strong class="pr-1">{{ $user->profile->followers()->count() }}</strong>followers
                                </a>
                            </div>
                            <div class="pr-5">
                                <a href="{{ route('follow.followings', $user->id) }}">
                                    <strong class="pr-1">{{ $user->following()->count() }}</strong>followings
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-2"><strong>{{ $user->profile->title }}</strong></div>
                <div class="pt-2"><p>{{ $user->profile->description }}</p></div>
                <div><a href="#">{{ $user->profile->url }}</a></div>
                <div>
                    @can('update', $user->profile)

                        <a href="{{ route('profile.edit',$user->id) }}"> Edit Profile</a>
                    @endcan

                </div>
            </div>
            <div class="post">
                @php

                $posts = $user->posts()->orderBy('created_at','desc')->paginate(6);
                @endphp
                <div class="row mb-4 mt-3">
                    @foreach($posts as $post)
                        <div class="col-md-4 pb-3">
                            <a href="{{ route('post.show', $post->id) }}">
                                <img src="/storage/{{ $post->image  }}" alt="" class="w-100">

                            </a>
                        </div>
                    @endforeach
                    {{ $posts->links() }}

                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script>



    </script>
@endsection
