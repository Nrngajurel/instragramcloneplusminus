@extends('layouts.app')

@section('title','Post By '.$post->user->username )
@section('content')
<div class="container">
    <div class="row d-flex">
        <div class="col-md-7">
            <div class="row">
                <a href="{{ route('post.show', $post->id) }}">
                    <img src="/storage/{{ $post->image  }}" alt="" class="w-100">

                </a>
            </div>
            <div class="row mt-2 d-flex justify-content-between">
                <i class="fas fa-thumbs-up"> Like</i>
                <i class="fas fa-heart"> love</i>
                <i class="fas fa-thumbs-down"> dislike</i>
                <i class="fas fa-comment"> comment</i>
                <i class="fas fa-share-alt"> Share</i>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row d-flex align-items-md-baseline">

                <div class="col-md-2">
                    <a href="{{ route('profile.show',$post->user->profile->id) }}">
                        <img src="/storage/{{ $post->user->profile->image }}" alt="{{ $post->user->username }}" class="rounded-circle w-100 mr-3">

                    </a>


                </div>
                <div class="col d-flex align-items-md-baseline">
                    <a href="{{ route('profile.show',$post->user->profile->id) }}">
                         <strong class="font-weight-bold h5">{{ $post->user->username }}</strong>
                    </a>
                    <div>
                        <input type="hidden" name="userId" id="userId" value="{{ $post->user->id }}">
                        <button class="btn text-secondary" id="follow"  onclick="followHandle(this)" value="{{ $follow }}" onchange="followChange(this)">follow</button>
                    </div>

                </div>

                @can('update', $post->user->profile)

                    <a href="#"> Edit Post</a>
                @endcan
            </div>
            <div class="row pl-4">
                <p>
                    {{ $post->caption }}
                </p>

            </div>
            <div class="row pl-4">
                @include('post.comment.commentform')

            </div>
            <div class="row my-2">
                    @foreach($comments as $comment)
                        <div class="col-md-2 my-3">
                            <a href="{{ route('profile.show',$comment->user->profile->id) }}">
                                <img src="/storage/{{ $comment->user->profile->image }}" alt="{{ $comment->user->username }}" class="rounded-circle w-100 mr-3">

                            </a>
                        </div>
                        <div class="col-md-10 my-3 border-bottom">
                            <div class="row">
                                <a href="{{ route('profile.show',$comment->user->profile->id) }}">
                                    <strong class="font-weight-bold h5">{{ $comment->user->username }}</strong>
                                </a>

                            </div>
                            <div class="row">
                                <p class="text-secondary">{{ $comment->comment_body }}</p> <br>
                                <span>{{ $comment->created_at->diffForHumans() }}</span>

                            </div>

                        </div>
                    @endforeach
                {{ $comments->links() }}

            </div>

        </div>
    </div>
</div>

@endsection