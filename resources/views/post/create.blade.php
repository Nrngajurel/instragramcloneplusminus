@extends('layouts.app')
@section('title','Create Post')
@section('content')
    <div class="container">

    <form action="{{ route('post.store') }}" method="post" class="form-group" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="caption" class="control-label">Caption</label>
            <input type="text" name="caption" id="caption" class="form-control">
            @if ($errors->has('caption'))
                <span class="help-block">
                                        <strong>{{ $errors->first('caption') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label for="image" class="control-label">image</label>
            <input type="file" alt="" name="image" class="form-control-file">
            @if ($errors->has('image'))
                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-secondary w-100">
        </div>

    </form>
    </div>

 @endsection
