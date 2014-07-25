@extends('layouts.default')
@section('body')
<div class="container">
    <div>
          	
        @if(Auth::check())
       		{{--*/
				$userDetails = User::find(Auth::user()->id)->userDetails;
			/*--}}
            <p>Welcome to your profile page {{$userDetails->first_name}} - {{$userDetails->last_name}}</p>
            
            {{--var_dump($userDetails);--}}
            
        @endif
        
        
        
    </div>
</div>
@stop