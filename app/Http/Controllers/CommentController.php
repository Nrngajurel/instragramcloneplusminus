<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth')->only(['store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @param Post $post_id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Post $post_id)
    {
        return $post_id->comments()->with('user')->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Post $post_id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Post $post_id, Request $request)
    {
        $comment= $request->validate(
            ['comment_body'=>'required']
        );
        $post_id->comments()->create(array_merge($comment,['user_id'=>auth()->user()->id]));
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
