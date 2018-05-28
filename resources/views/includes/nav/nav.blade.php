<nav class="navbar has-shadow">
	<div class="container">
		<div class="navbar-start">
			<a href="{{ route('home') }}" class="navbar-item is-tab is-hidden-mobile">Home</a>
			<a href="#" class="navbar-item is-tab is-hidden-mobile">About Us</a>
			<a href="#" class="navbar-item is-tab is-hidden-mobile">Services</a>
			<a href="#" class="navbar-item is-tab is-hidden-mobile">Blog</a>
			<a href="#" class="navbar-item is-tab is-hidden-mobile">Contact</a>
		</div>

		<div class="navbar-end">
			@if(Auth::guest())
				<a href="{{ route('login') }}" class="navbar-item is-tab">Login</a>
				<a href="{{ route('register') }}" class="navbar-item is-tab">Register</a>
			@else
				<button class="dropdown is-aligned-right navbar-item is-tab">
					Hey {{ auth()->user()->name }} <span class="icon"><i class="fa fa-caret-down"></i></span>
				
					<ul class="dropdown-menu">
						<li><a href="#">
							<span class="icon"><i class="fa fa-fw fa-user-circle-o"></i></span> 
						Profile</a></li>

						<li><a href="{{ route('manage.dashboard') }}">
							<span class="icon"><i class="fa fa-fw fa-cog"></i></span> 
						Manage</a></li>

						<li class="seperator"></li>

						<li><a href="{{ route('logout') }}">
							<span class="icon"><i class="fa fa-fw fa-sign-out"></i></span> 
						Logout</a></li>
					</ul>
				</button>
			@endif
		</div>
	</div>
</nav>