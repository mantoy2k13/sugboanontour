@extends('layouts.master')
@section('container')

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

				<div class="p-4">
					<form class="airbnb-search-form" action="{{url('searchvehicle')}}" method="GET">
						<div class="search-fields">
							<div class="search-field location">
								<label for="location">Address</label>
								<input type="text" name='vehicle_address' id="location" placeholder="Search destinations" />
							</div>
							<div class="search-field name">
								<label for="location">Name vehicle</label>
								<input type="text" name ="search_vehicle" id="location" placeholder="Search destinations" />
							</div>
							<div class="search-field dates">
								<select name="vehicle_type" id="" class="form-control border-0">
									<option value=""> Please select vehicle type </option>
									<option value="sedan"> Sedan</option>
									<option value="suv"> SUV</option>
									<option value="van"> Van</option>
									<option value="hatchback">Hatchback</option>
									<option value="crossover">Cross Over</option>
									<option value="pickup">Pick Up</option>
									<option value="coaster">Coaster</option>
								</select>
							</div>

						</div>
						<button type="submit" class="search-button">
							<!-- Magnifying Glass Icon (use an SVG or icon library) -->
							🔍
						</button>
					</form>
				</div>


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
																																		if ($car->vehicle_type == 'sedan') {
							$stndrate = 1700;
							$seaters = 5;
						} else if ($car->vehicle_type == 'hatchback') {
							$seaters = 5;
							$stndrate = 1500;
						} else if ($car->vehicle_type == 'suv') {
							$stndrate = 2500;
							$seaters = 8;
						} else if ($car->vehicle_type == 'van') {
							$stndrate = 3500;
							$seaters = 15;
						} else {
							$seaters = 5;
							$stndrate = 1700;
						}	
																																																	?>

							<div class="col-md-3" id="car{{$car->id}}">
								<div class="car-wrap rounded ftco-animate">
									<div class="img rounded d-flex align-items-end" style="background-image:
																									 url('{{ asset('files/' . $car_img[0]) }}');">
										<h3 class='text-white available font-weight-bolder'>{{$car->name}}
											{{$car->model}}
										</h3>
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
												{{ $car->location }}
											</p>



											<div class='d-flex flex-row justify-content-between'>
												<div class=''>
													<p class='text-black'><span
															class="flaticon-car-seat text-default"></span>{{$seaters}}
														seater<span class="flaticon- text-default"></span>
													</p>
												</div>
												<div class=''>
													<span class="flaticon-pistons text-default"> </span> {{ ucfirst($car->t_type) }}
												</div>
											</div>
											<div class='d-flex flex-row justify-content-between'>
												<div class=''>
													<p class='text-black'><span
															class="flaticon-diesel text-default"></span>{{ ucfirst($car->f_type) }}

													</p>
												</div>
												<div class=''>

													<span class="flaticon-car text-default"> </span> {{ ucfirst($car->vehicle_type) }}
												</div>
											</div>

											<div class='d-flex flex-row justify-content-between border-top border-bottom pt-2'>
												<div class=''>
													<img src="{{asset('images/clock-five.png')}}" alt="" style='width:16px;height:16px'
														class='text-default' /> 1 day
												</div>
												<div class=''>
													<p class='font-weight-bolder'>
														<?php 

																																		?>
														PHP {{number_format($stndrate)}}
													</p>
												</div>
											</div>
											{{-- end rate --}}
											<div class='d-flex flex-row justify-content-center border-top border-bottom pt-2'>
												<h3>
													<span class="icon-mobile-phone text-default"></span> <span
														class="text-lg text-default font-weight-bold">
														@if($car->role == 2)
															{{ $ph_subs = $car->phone }}

														@else

															{{  $ph_subs = substr_replace($car->phone, "xxx", -3) }}
														@endif

												</h3>
											</div>

										</div>
										<p class="d-flex mb-0 d-block"><a href="{{$book_url}}"
												class="btn btn-secondary py-2 ml-1 w-100">Book
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