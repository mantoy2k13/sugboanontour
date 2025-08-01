@extends('layouts.master')
@section('content')
	<section class="ftco-section ftco-cart">

		<div class="container py-5">
			<div class="row">
				<?php 
										$id = (Auth::check()) ? Auth::user()->id : 0;
	$name = (Auth::check()) ? Auth::user()->name : 'Juan Dela Cruaz';
									?>
				<div class="col-md-4">
					<span class='messagealert text-success' id="success"></span>
				</div>
				@if(session('success'))
					<div class="col-md-8 ">
						<div class="alert alert-success" role="alert">
							<p class='text-default'>{{ session('success') }}</p>
						</div>
						
					</div>
				@endif
				<span class='flex'>
					<a href="{{url('/cars')}}" class="btn btn-primary"> Add Cars</a>
				</span>
			</div>
			<div>
				<h3 class='text-black'>Welcome,
					<span class='text-default text-lg'> {{$name}} </span>
				</h3>
			</div>

		</div>
		<!-- #region -->
	</section>


	<section class="ftco-section bg-light">

		<div class="container">
			<div class="row">

				@if(count($cars) > 0)

					@foreach($cars as $keycar => $car)
						<?php 
							$car_img = json_decode($car->img, true);
							if ($car->book_status == 1) {
								$message_available = 'Your car is Available';
								$text_color = 'text-white';
							} else {
								$message_available = 'Your car is Booked';
								$text_color = 'text-danger';
							}							
						?>
						<div class="col-md-4" id="car{{$car->id}}">
							<div class="car-wrap rounded ftco-animate">
								<div class="img rounded d-flex align-items-end"
									style="background-image: url('{{asset('files/' . $car_img[0])}}');">
									<h3 class='available font-weight-bolder {{$text_color}}'>{{$message_available}}</h3>
								</div>
								<div class="text">
									<h2 class="mb-0 text-default"><a href="car-single.html" class='text-default'>{{$car->name}} {{$car->model}} </a>
									</h2>
								
									<div class='d-flex mb-2'>
										<a href="javascript:void(0)" class="btn btn-danger"
											onclick="cardelete({{$car->id}})"><i class="icomoon icon-remove"></i></a>
										<i class="fa fa-edit"></i>
										<a href="{{url('/cars/edit/'.$car->id)}}" class='btn btn-success'><i class="icomoon icon-undo"></i> Edit</a>
									</div>
										
											<button role="button" class="btn btn-secondary py-2 ml-1"
											onclick="setavailable({{$car->id}}, 1)">
											 Set to avaiable

										</button>
										<button role="button" class="btn btn-secondary py-2 ml-1"
											onclick="setavailable({{$car->id}}, 2)">
											Set to NOT AVAILABLE
										</button>

									
								</div>
							</div>
						</div>
					@endforeach
				@else

					<h3 class="text-default">
						you dont have yet uploaded cars,.. please add car,
					</h3>

				@endif

			</div>

		</div>
	</section>
@endsection
@section('script')

	<script type="text/javascript">

		var adminUrl = "{{url('/')}}";

	</script>
@endsection
@yield('script')
@push('head')


	<!-- Scripts -->

	<script src="{{ asset('js/custom.js')}}"></script>

@endpush