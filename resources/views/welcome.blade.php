@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-3 p-5">
        <img src="{{ asset('img/pic2.jpg') }}" class="w-100 rounded-circle" alt="profile picture">
    </div>
    <div class="col-9 pt-5">
        <h1>narayangajurel</h1>
        <div class="d-flex">
            <div class="pr-5"><strong class="pr-1">400</strong>posts</div>
            <div class="pr-5"><strong class="pr-1">40k</strong>followers</div>
            <div class="pr-5"><strong class="pr-1">10K</strong>followings</div>
        </div>
        <div class="pt-2"><strong>nrngajurel.com</strong></div>
        <div class="pt-2"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias esse excepturi molestiae obcaecati similique tempora? Dolorem inventore nostrum quod sequi!</p></div>
        <div><a href="#">nrngajurel.com</a></div>
    </div>
    <div class="post">
        <div class="row mb-4">
            <div class="col">
                <img src="{{ asset('img/pic1.jpg') }}" alt="" class="w-100">
            </div>
            <div class="col">
                <img src="{{ asset('img/pic1.jpg') }}" alt="" class="w-100">
            </div>
            <div class="col">
                <img src="{{ asset('img/pic3.jpg') }}" alt="" class="w-100">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img src="{{ asset('img/pic3.jpg') }}" alt="" class="w-100">
            </div>
            <div class="col">
                <img src="{{ asset('img/pic1.jpg') }}" alt="" class="w-100">
            </div>
            <div class="col">
                <img src="{{ asset('img/pic3.jpg') }}" alt="" class="w-100">
            </div>
        </div>
    </div>
</div>
</div>
@endsection
