<?php $currenturl = url()->full();?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/profile.jpg')}}" style="width:100px;height:100px; border-radius:50%;"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
			<?php
				if($currenturl != url('')) {
					$black = 'black';
				}
				else{
					$black = '';
				}
			?>

	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{url('/') }}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="{{url('hotels')}}" class="nav-link <?=$black;?>">Hotels</a></li>
	          <li class="nav-item"><a href="#" class="nav-link <?=$black;?>">Services</a></li>
	          <li class="nav-item"><a href="#" class="nav-link <?=$black;?>">Pricing</a></li>
	          <li class="nav-item"><a href="#" class="nav-link <?=$black;?>">Cars</a></li>
	          <li class="nav-item"><a href="#" class="nav-link <?=$black;?>">Blog</a></li>
	          <li class="nav-item"><a href="#contact.html" class="nav-link <?=$black;?>">Contact</a></li>
			  <li class="nav-item">
				<a class="nav-link <?=$black;?>" href="{{ route('register-user') }}">Register</a>
			  </li>
			  @if (Auth::check())
			  <li class="nav-item">
				<a class="nav-link <?=$black;?>" href="{{ route('signout') }}" >Logout</a>
			</li>

			  @else

			  <li class="nav-item">
				  <a class="nav-link <?=$black;?>"  href="{{ route('login') }}">Login</a>
			  </li>

			  @endif
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

	@if($currenturl == url(''))
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('images/bg_header.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Sugboanon Travel &amp; Tours</h1>
				<h2 class="mb-4"><a href="tel:+63915 097 1513" style="color:#FF5E00;"> 0915 097 1513</a> </h2>
	            <p style="font-size: 18px;">Very affordables Rates </p>
            </div>
          </div>
        </div>
      </div>
    </div>
	@endif
