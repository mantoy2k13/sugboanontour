
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/profile.jpg')}}" style="width:100px;height:100px; border-radius:50%;"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
			

	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{url('/') }}" class="nav-link">Home</a></li>
	          <li class="nav-item" ><a href="{{url('hotels')}}" class="nav-link ">Hotels</a></li>
	          <li class="nav-item"><a href="#" class="nav-link ">Services</a></li>
			  <li class="nav-item"><a href="#" class="nav-link ">Find Cars</a></li>
	          
	          <li class="nav-item"><a href="#" class="nav-link ">Cars</a></li>
	          
	          <li class="nav-item"><a href="#contact.html" class="nav-link ">Contact</a></li>
			  <li class="nav-item">
				<a class="nav-link " href="{{ route('register-user') }}">Register</a>
			  </li>
			  @if (Auth::check())
			  <li class="nav-item">
				<a class="nav-link " href="{{ route('signout') }}" >Logout</a>
			</li>

			  @else

			  <li class="nav-item">
				  <a class="nav-link "  href="{{ route('login') }}">Login</a>
			  </li>

			  @endif
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->


