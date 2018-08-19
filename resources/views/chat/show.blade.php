@extends('layouts.app')


@section('content')
<meta name="friend_id" content="{{ $friend->id }}">
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            
            <chat
                v-bind:chats="chats"
                v-bind:user_id="{{ Auth::check() ? Auth::user()->id : 'null' }}"
                v-bind:friend_id="{{ $friend->id }}"
            ></chat>
            
        </div>
    </div>
</div>

@endsection