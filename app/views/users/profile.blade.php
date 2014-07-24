@extends('layouts.default')
@section('body')
<div class="container">
    <div>
        @if(Auth::check())
            <p>Welcome to your profile page {{Auth::user()->first_name}} - {{Auth::user()->last_name}}</p>
        @endif
        
        {{ $user = User::find(Auth::user()->id)->userDetails;}}
        {{var_dump($user);}}
    </div>
</div>
@stop