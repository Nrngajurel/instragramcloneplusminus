<form action="{{ route('post.comment.store', $post->id) }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <textarea name="comment_body" id="" cols="100%" rows="2" class="form-control w-100 d-block mt-4"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Comment" class="btn btn-outline-primary float-right">
    </div>
</form>