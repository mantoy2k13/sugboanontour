@extends('layouts.master')
@section('container')

	<div class="d-flex justify-content-center align-items-center pb-5" style="background-image: url('{{ asset('images/default70e9bbf2.png') }}');
					background-repeat: no-repeat;
					background-size: 100% 100%;">

		<div class="pt-7 pb-2">
			<h2 class="text-white">Travel easier with <span class="text-default"> CebuCarbnb </span></h2>
			<div class="pt-2 pb-2">
				<h2 class="text-white">Book Now & Drive safe</h2>
			</div>
			<form action="{{url('searchvehicle')}}" method="GET" class="form-container p-lg-4 p-sm-0">
				<div class="d-flex flex-wrap">
					<div class="form-group col-lg-auto col-sm-12">

						<input type="text" id="location" class="rounded-pill " name="vehicle_address"
							placeholder="Location address">
					</div>


					<div class="form-group col-lg-auto col-sm-12">

						<input type="text" id="location" name="search_vehicle" class="rounded-pill"
							placeholder="Vehicle Name">
					</div>



					<div class="form-group col-lg-auto col-sm-12 ">

						<select id="guests" name="vehicle_type" class="rounded-pill form-control ">
							<option value=""> Please select vehicle type </option>
							<option value="sedan"> Sedan</option>
							<option value="suv">SUV</option>
							<option value="van">Van</option>
							<option value="hatchback">Hatchback</option>
							<option value="crossover">Cross Over</option>
							<option value="pickup">Pick Up</option>
							<option value="coaster">Coaster</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success ">Search</button>
					</div>

				</div>

			</form>
		</div>
	</div>
	
		<div class="row">
			
			@if(count($findcars) > 0)
			<div class="d-flex justify-content-center align-items-center pt-4 pb-2">
					<div class="d-flex flex-wrap">
						<h3 class="text-default">
						Total {{ count($findcars) }}	vehicle found
					</h3>
					</div>
			</div>
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
						}
						else if ($car->vehicle_type == 'hatchback'){
							$seaters = 5;
							$stndrate = 1500;
						}
						else if ($car->vehicle_type == 'suv') {
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

							<div class="col-md-2" id="car{{$car->id}}">
								<div class="car-wrap rounded ftco-animate">
									<div class="img rounded d-flex align-items-end"
										style="background-image: url('{{asset('carbnb/public/files/' . $car_img[0])}}');">
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
													<p class='text-black'><span class="flaticon-diesel text-default"></span>{{ ucfirst($car->f_type) }}

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
														PHP {{number_format($stndrate)}}</p>
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
													
													{{  $ph_subs = substr_replace($car->phone, "xxxxx", -5) }}
													@endif
														</span>
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

				<div class="d-flex justify-content-center align-items-center pt-2">
					<div class="d-flex flex-wrap">
						<h3 class="text-default">
						No results search found.
					</h3>
					</div>
				</div>
					

				@endif
		</div>
	




@endsection

@push('head')


	<!-- Scripts -->

	<script src="{{ asset('js/custom.js')}}"></script>

@endpush