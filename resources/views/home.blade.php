@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container">
    @auth()
    <form action="{{ route('post.store') }}" method="post" class="form-group" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-row">
        <div class="form-group col-md-8">
            <textarea name="caption" id="" rows="3" class="form-control border-0"></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="image" id="image" class="form-control-file file">
            <button type="submit" class="btn btn-secondary w-100 mt-3">Upload</button>
        </div>
            <hr>
        </div>
    </form>
    @endauth
    <div class="row mb-4">
        @foreach($posts as $post)
            <div class="col-md-4 pb-3">
                <a href="{{ route('post.show', $post->id) }}">
                    <img src="/storage/{{ $post->image  }}" alt="" class="w-100">
                </a>
                <div class="col-md-12 my-2">
                    <div class="row d-flex">
                        <div class="col-md-3">
                        <a href="{{ route('profile.show',$post->user->profile->id) }}">
                            <img src="/storage/{{ $post->user->profile->image }}" alt="{{ $post->user->username }}" class="rounded-circle w-100 mr-3">

                        </a>
                        </div>
                        <div class="col-md-9">
                            <a href="{{ route('profile.show',$post->user->profile->id) }}">
                                <strong class="font-weight-bold h5">{{ $post->user->username }}</strong>
                            </a>
                            <p>Posted {{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>



                </div>
            </div>
        @endforeach
    </div>
    <div class="row d-flex justify-content-end">

        {{$posts->links()}}
    </div>
</div>
@endsection
