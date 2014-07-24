    {{HTML::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css')}}
    {{HTML::style('style/style.css')}}
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	    	<button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button" class="navbar-toggle"> 
	    	<span class="sr-only">Toggle navigation</span>    </button> 
	    	<a href="/" class="navbar-brand">Laravel</a>
	    </div>
	   
    <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
	   <ul class="nav navbar-nav navbar-right">
		 @if (Auth::check())

		<li><a href="/logout">Log Out</a></li>
		<li><a href="/profile">{{ Auth::user()->first_name }}</a></li>
		@else
	    <li><a href="/login">Login</a></li>
		<li><a href="/user/create">Sign Up</a></li>
    	@endif
    	</ul>
    </div>
     </div>
	</div>
	<div class="container">
		<div class="row">
		  <div class="col-md-4 col-md-offset-4">
			<ul>
		            @foreach ($errors->all() as $message)<p></p>
				<li>{{$message}}</li>
				<p>@endforeach</p>
			</ul>
		   </div>
		</div>
	</div>
	@if(Session::has('message'))
		<div class="container-fluid">
		
		
			<h2>{{ Session::get('message') }}</h2>
		
			
		</div>
	@endif
	@yield('body')
	
	{{HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js')}} 
	{{HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js')}} 
	@show