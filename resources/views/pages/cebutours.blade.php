@extends('layouts.master')
@section('content')

<div class="container">
  <div class='row justify-content-center'>
        	@if(session('success'))
					<div class="col-md-6 ">
						<div class="alert alert-success" role="alert">
							<p class='text-default'>{{ session('success') }}</p>
						</div>
						
					</div>
				@endif
  </div>
    <div class="py-5" >&nbsp;</div>
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	
            <span class="subheading">Carbnb & Tours</span>
            <h2 class='text-default'> <a href="tel:+63915 097 1513"
							class='text-default'><span class="icon-mobile-phone"></span> 0915 097 1513</a></h2>
          </div>
        </div>
        <div class="row d-flex">
          
              @foreach($tours as $tour)
              <?php 
                $img = json_decode($tour->name, true);
              ?>
                
              <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                  <a href="{{ url('tourpackage')}}/{{$tour->id}}" class="block-20" style="background-image: url('carbnb/public/files/{{$img[0] }}');">
                  </a>
                  <div class="text pt-4">
                    <h4 class=""><a href="{{ url('tourpackage')}}/{{$tour->id}}" class='text-default '> {{ strtolower($tour->title)}}</a></h4>
                    <p><a href="{{ url('tourpackage')}}/{{$tour->id}}" class="btn btn-secondary">View more</a></p>
                  </div>
                </div>
              </div>
              @endforeach
        
        </div>
      </div>
@endsection
 