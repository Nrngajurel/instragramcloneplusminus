@extends('layouts.app')
@section('title','Edit Profile')
@section('content')
    <div class="container">

        <form action="{{ route('profile.update',$profile->id ) }}" method="post" class="form-group" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <div class="form-group">
                <label for="title" class="control-label">Title  </label>
                <input type="text" name="title" id="caption" class="form-control" value="{{ $profile->title }}">
                @if ($errors->has('title'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="description" class="control-label">Description  </label>
                <textarea name="description" id="caption" class="form-control" rows="5">{{ $profile->description }}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="url" class="control-label">Url  </label>
                <input type="text" name="url" id="caption" class="form-control" value="{{ $profile->url }}">
                @if ($errors->has('url'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="image" class="control-label">Profile Image</label>
                <input type="file" alt="" name="image" class="form-control-file">
                @if ($errors->has('image'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
           title       @endif
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-secondary w-100">
            </div>

        </form>
    </div>

@endsection
