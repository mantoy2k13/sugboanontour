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
			<div class='d-flex  justify-content-around'>
				<div class='d-flex '>
					@if(session('success'))

						<div class="alert alert-success" role="alert">
							<p class='text-default'>{{ session('success') }}</p>
						</div>

					@endif
					<h1 class='text-default'><span class="icon-mobile-phone"></span> <a href="tel:+63915 097 1513"
							class='text-default'> 0915 097 1513</a></h1>
				</div>
				 	
			</div>
			<div class="row">

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

							<?php 
										if ($car->vehicle_type == 'sedan' || $car->vehicle_type == 'hatchback') {
							$v_type = 'Sedan';
							$seaters = 5;
						} else if ($car->vehicle_type == 'suv') {
							$v_type = 'Suv';
							$seaters = 8;
						} else if ($car->vehicle_type == 'van') {
							$v_type = 'Van';
							$seaters = 15;
						} else {
							$v_type = 5;
						}	
																									?>

							<div class="col-md-3" id="car{{$car->id}}">
								<div class="car-wrap rounded ftco-animate">
									<div class="img rounded d-flex align-items-end"
										style="background-image: url('{{asset('files/' . $car_img[0])}}');">
										<h3 class='text-white available font-weight-bolder'>{{$car->name}}
													{{$car->model}}</h3>
									</div>
									<div class="text">
										<div class='d-flex flex-row justify-content-center'>
											<h2 class="mb-0 text-default"><a href="{{$book_url}}"
													class='text-default text-decoration-none'> </a></h2>
										</div>

										<div class="d-flex flex-column  mb-3">
											<p>
												<img src="{{asset('images/loc.png')}}" alt="" class=""
													style="width:20px;height:20px;" />
												{{ucfirst($car->location)}}
											</p>



											<div class='d-flex flex-row justify-content-between'>
												<div class=''>
													<p class='text-black'><span
															class="flaticon-car-seat text-default"></span>{{$seaters}}
														seater<span class="flaticon- text-default"></span>
													</p>
												</div>
												<div class=''>
													<span class="flaticon-pistons text-default"> </span> Automatic
												</div>
											</div>
											<div class='d-flex flex-row justify-content-between'>
												<div class=''>
													<p class='text-black'><span class="flaticon-diesel text-default"></span>Gasoline

													</p>
												</div>
												<div class=''>

													<span class="flaticon-car text-default"> </span> {{$v_type}}
												</div>
											</div>

											<div class='d-flex flex-row justify-content-between border-top border-bottom pt-2'>
												<div class=''>
													<img src="{{asset('images/clock-five.png')}}" alt="" style='width:16px;height:16px'
														class='text-default' /> 1 day
												</div>
												<div class=''>
													<p class='font-weight-bolder'>PHP {{number_format($car->rate, 2)}}</p>
												</div>
											</div>


										</div>
										<p class="d-flex mb-0 d-block"><a href="{{$book_url}}" class="btn btn-secondary py-2 ml-1 w-100">Book
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

				<div class='d-flex align-items-center justify-content-center'>

					<div class='d-flex '>

						<ul class='pagination'>

							@if ($findcars->onFirstPage())
								<li class="page-item disabled"><span class='page-link'> Previous</span></li>
							@else
								<li class='page-item'>
									<a class="page-link" href="{{ $findcars->withQueryString()->previousPageUrl() }}">Prev</a>
								</li>
							@endif



							@foreach ($findcars as $element)

								@if (is_string($element))
									<li class="page-item disabled"><span>{{ $element }}</span></li>
								@endif



								@if (is_array($element))
									@foreach ($element as $page => $url)
										@if ($page == $findcars->currentPage())
											<li class="page-item active"><span>{{ $page }}</span></li>
										@else
											<li class='page-item'><a href="{{ $url }}" class='page-link'>{{ $page }}</a></li>
										@endif
									@endforeach
								@endif
							@endforeach



							@if ($findcars->hasMorePages())
								<li class='page-item'>
									<a class="page-link" href="{{ $findcars->withQueryString()->nextPageUrl() }}">Next</a>
								</li>
							@else
								<li class="page-link"><span>Next</span></li>
							@endif
						</ul>
					</div>
				</div>
				<!-- end div for pagination-->

			</div>

		</div>
	</section>
@endsection

@push('head')


	<!-- Scripts -->

	<script src="{{ asset('js/custom.js')}}"></script>

@endpush