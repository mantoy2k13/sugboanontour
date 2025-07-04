@extends('layouts.master')
@section('content')

	<section class="ftco-section bg-light">
		{{-- <div class="col-lg-8 ftco-animate">
			<div class="text w-100 text-center mb-md-5 pb-md-5">
				<h1 class="mb-2">Direct call</h1>
				<h2 class="mb-2"><a href="tel:+63915 097 1513" style="color:#FF5E00;"> 0915 097 1513</a> </h2>
				<p style="font-size: 18px;">Less hustle </p>
			</div>
		</div> --}}
		<div class="container">
			<div class="row">
					@if(session('success'))
					<div class="col-md-12 d-flex ">
						<div class="alert alert-success" role="alert">
							<p class='text-black'>{{ session('success') }}</p>
						</div>
					</div>
				@endif
				@if(count($findcars) > 0)

					@foreach($findcars as $keycar => $car)

							<?php 
										$car_img = json_decode($car->img, true);
						if ($car->book_status == 1) {
							$message_available = 'Available';
							$text_color = 'text-white';
						} else {
							$message_available = 'Booked';
							$text_color = 'text-danger';
						}
						$book_url = url('vehicle/' . $car->id);
										?>

							<div class="col-md-4" id="car{{$car->id}}">
								<div class="car-wrap rounded ftco-animate">
									<div class="img rounded d-flex align-items-end"
										style="background-image: url('{{asset('files/' . $car_img[0])}}');">
										<h3 class='available font-weight-bolder {{$text_color}}'>{{$message_available}}</h3>
									</div>
									<div class="text">
										<h2 class="mb-0 text-default"><a href="car-single.html" class='text-default'>{{$car->name}}
												{{$car->model}} </a></h2>
										<div class="d-flex flex-column  mb-3">
											<p class="font-weight-bolder"> Rate: {{$car->rate}} <span class='font-weight-light'> /
													day</span></p>
											<p class='text-black'><span class="icon-map-o"></span>
												{{strtoupper($car->location)}}
											</p>
											<p class='text-black'><span class="flaticon-car-seat"></span> 5 seats adult</p>

										</div>
										<p class="d-flex mb-0 d-block"><a href="{{$book_url}}" class="btn btn-secondary py-2 ml-1">Book
												now</a>

										</p>
									</div>
								</div>
							</div>


					@endforeach
				@else

					<h3 class="text-default">
						No available as of moment, Congrats fullybook!
					</h3>

				@endif

			</div>

		</div>
	</section>
@endsection

@push('head')


	<!-- Scripts -->

	<script src="{{ asset('js/custom.js')}}"></script>

@endpush