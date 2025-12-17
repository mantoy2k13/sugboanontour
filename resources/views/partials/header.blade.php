<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/cebucarbnb-logo.png')}}"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
			aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">

			<?php
	
?>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item <?=$active = ($title == 'home') ? 'active' : '';?>"><a href="{{url('/') }}"
						class="nav-link">Home</a></li>
				<li class="nav-item <?=$active = ($title == 'cebutour') ? 'active' : '';?>"><a
						href="{{url('cebutour')}}" class="nav-link ">Cebu Tours</a></li>
				<li class="nav-item">

					<div class="btn-group flex-column">
						<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							Hotels & Inns
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{url('hotel/oslob')}}">Oslob</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{url('hotel/moalboal')}}">Moalboal</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Badian</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{url('hotel/santafe')}}">Santa Fe </a>

						</div>
					</div>
				</li>
				<li class="nav-item <?=$active = ($title == 'contact') ? 'active' : '';?>"><a href="{{url('contact')}}"
						class="nav-link ">Contact </a></li>
				<li class="nav-item <?=$active = ($title == 'aboutus') ? 'active' : '';?>"><a href="{{url('aboutus')}}"
						class="nav-link ">About-Us </a></li>
						
				<li class="nav-item"><a href="tel:+63915 097 1513" class='nav-link'><span
							class="icon-mobile-phone"></span> 0915 097 1513</a> </li>

				@if (Auth::check())
					

						<li class="nav-item">

					<div class="btn-group flex-column">
						<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							My Accounts
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{url('dashboard')}}">Dashboard</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{url('mybooking')}}">mybooking</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{url('signout')}}">Log out</a>

						</div>
					</div>
				</li>
					

				@else
					<li class="nav-item <?=$active = ($title == 'registration') ? 'active' : '';?>"><a href="{{url('registration')}}"
						class="nav-link ">Register </a></li>
					<li class="nav-item <?=$active = ($title == 'login') ? 'active' : '';?>">
						<a class="nav-link" href="{{ route('login') }}">Login</a>
					</li>
					
				@endif
			</ul>
		</div>
	</div>
</nav>
<!-- END nav -->

{{--
<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('images/bg_header.jpg') }}');"
	data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
			<div class="col-lg-8 ftco-animate">
				<div class="text w-100 text-center mb-md-5 pb-md-5">
					<h1 class="mb-4">Cebu Car Bnb </h1>
					<h2 class="mb-4"><a href="tel:+63915 097 1513" style="color:#FF5E00;"> 0915 097 1513</a> </h2>
					<p style="font-size: 18px;">Less hustle </p>
				</div>
			</div>
		</div>
	</div>
</div> --}}