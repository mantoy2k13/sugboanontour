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
		<div class="container">
			<div class="d-flex justify-content-center align-items-center">
				<div class="d-flex flex-wrap gap-1">
					<img src="{{ asset('images/gcash.png') }}" alt="" style="width:75px;height:75px;">
					<img src="{{ asset('images/visa.png') }}" alt="" style="width:75px;height:75px;">
					<img src="{{ asset('images/master-card.webp') }}" alt="" style="width:75px;height:75px;">
				</div>
			</div>
			<div class="d-flex justify-content-center align-items-center pt-5">
				<div class="d-flex flex-wrap gap-1">
					<h2 class="text-default">Wide choices
						<span class="text-black">of vehicles!</span>
					</h2>
				</div>
			</div>
			<div class="d-flex justify-content-center align-items-center pt-2">
				<div class="d-flex flex-wrap gap-1">
					<h3 class="text-black">Top quality and with the
						<span class="text-default">lowest price </span>
						in the market!
					</h3>
				</div>
			</div>

			<div class="d-flex justify-content-center align-items-center pt-4">
				<div class="d-flex flex-wrap gap-lg-2 gap-sm-0">
					<div class="">
						<div>
							<img src="{{ asset('images/SEDAN.webp') }}" alt="" style="width:186px;">
						</div>
						<div class="d-flex  justify-content-center align-items-center">
							<h3 class="text-default text-bold">Sedan</h3>
						</div>
					</div>
					<div class="">
						<div>
							<img src="{{ asset('images/VAN.webp') }}" alt="" style="width:186px;">
						</div>
						<div class="d-flex  justify-content-center align-items-center">
							<h3 class="text-default text-bold">Van</h3>
						</div>
					</div>
					<div class="">
						<div>
							<img src="{{ asset('images/SUV.webp') }}" alt="" style="width:186px;">
						</div>
						<div class="d-flex  justify-content-center align-items-center">
							<h3 class="text-default text-bold">Suv</h3>
						</div>
					</div>
					<div class="">
						<div>
							<img src="{{ asset('images/PICKUP.webp') }}" alt="" style="width:186px;">
						</div>
						<div class="d-flex  justify-content-center align-items-center">
							<h3 class="text-default">Pick Up</h3>
						</div>
					</div>
					<div class="">
						<div>
							<img src="{{ asset('images/HATCHBACK.webp') }}" alt="" style="width:186px;">
						</div>
						<div class="d-flex  justify-content-center align-items-center">
							<h3 class="text-default">Hatchback</h3>
						</div>
					</div>
				</div>
			</div>
		</div>




	</div>




@endsection

@push('head')


	<!-- Scripts -->

	<script src="{{ asset('js/custom.js')}}"></script>

@endpush