@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Friends</p>
                </div>
                <div class="panel-body">
                   
                    <ul class="list-group">
                    @forelse($friends as $friend)
                        <a href="{{ route('chat.show', ['id' => $friend->id]) }}">
                            <li class="list-group-item">
                                <span>{{ $friend->name }}</span>
                                <user-online
                                    v-bind:friend="{{ $friend }}"
                                    v-bind:online_users="online_users"
                                ></user-online>
                            </li>
                        </a>
                    @empty
                        <p>No Friends</p>
                    @endforelse
                    </ul>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection