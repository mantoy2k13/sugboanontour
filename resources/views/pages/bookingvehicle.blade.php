@extends('layouts.master')
@section('content')

	<section class="ftco-section ftco-car-details">
		<div class="container">
			<div class="row justify-content-center">

				<?php
				$petrol = '';
	$js = json_decode($car[0]->img, true);
	if ($car[0]->vehicle_type == 'sedan' || $car[0]->vehicle_type == 'hatchback') {
		$seaters = 5;
		$petrol = 'Gasoline';
	} else if ($car[0]->vehicle_type == 'suv') {
		$seaters = 8;
		
	} else if ($car[0]->vehicle_type == 'van') {
		$seaters = 15;
		$petrol = 'Deisel';
	} else {
		$seaters = 5;
	}
																?>


				<section class="ftco-section ftco-no-pt ">
					<div class="d-flex justify-content-around">

						<div class="col-md-8">
							<div class="carousel-car owl-carousel">
								@foreach($js as $dis_img)
									<div class="item">
										<div class="car-wrap rounded ftco-animate">
											<div class="img rounded d-flex align-items-end"
												style="background-image: url('{{asset('files/' . $dis_img)}}');height:350px;">
											</div>
											<div class="text">
												<h2 class="mb-0 "><a href="#" class='text-default'>{{$car[0]->name }}
														{{$car[0]->model}}</a></h2>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="row">
				<div class="col-md d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services">
						<div class="media-body py-md-4">
							<div class="d-flex mb-3 align-items-center">
								<div class="icon d-flex align-items-center justify-content-center"><span
										class="flaticon-dashboard"></span></div>
								<div class="text">
									<h3 class="heading mb-0 pl-3">
										Mileage
										<span>40,000</span>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services">
						<div class="media-body py-md-4">
							<div class="d-flex mb-3 align-items-center">
								<div class="icon d-flex align-items-center justify-content-center"><span
										class="flaticon-pistons"></span></div>
								<div class="text">
									<h3 class="heading mb-0 pl-3">
										Transmission
										<span>Manual</span>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services">
						<div class="media-body py-md-4">
							<div class="d-flex mb-3 align-items-center">
								<div class="icon d-flex align-items-center justify-content-center"><span
										class="flaticon-car-seat"></span></div>
								<div class="text">
									<h3 class="heading mb-0 pl-3">
										Seats
										<span>{{$seaters}}</span>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services">
						<div class="media-body py-md-4">
							<div class="d-flex mb-3 align-items-center">
								<div class="icon d-flex align-items-center justify-content-center"><span
										class="flaticon-backpack"></span></div>
								<div class="text">
									<h3 class="heading mb-0 pl-3">
										Luggage
										<span>4 Bags</span>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services">
						<div class="media-body py-md-4">
							<div class="d-flex mb-3 align-items-center">
								<div class="icon d-flex align-items-center justify-content-center"><span
										class="flaticon-diesel"></span></div>
								<div class="text">
									<h3 class="heading mb-0 pl-3">
										Fuel
										<span>{{$petrol}}</span>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="ftco-section contact-section">
				<div class="container">
					<div class="row d-flex mb-5 contact-info">
						<div class="col-md-4">
							<div class="accordion" id="accordionExample">
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											<span class='text-default'>What are the steps to rent this vehicle?</span>
										</button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse show"
										data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<p>Renting from Carbnb is easy and it is the first in the Philippines
												to offer a seamless
												booking experience.</p>
											<ol>
												<li>Pick a vehicle to rent and check out the rental price.</li>
												<li>Book it by clicking the Book Now button and you have to pay
													the reservation fee.
												</li>
												<li data-v-1a0939d5="">We support GCash, Visa and Mastercard for the payment
													of
													reservation fee.</li>
												<li data-v-1a0939d5="">That's it! Remaining balance will be settled upon
													pick up of
													the vehicle. Easy!
												</li>
											</ol>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											<span class='text-default'> What about the car washing?</span>
										</button>
									</h2>
									<div id="collapseTwo" class="accordion-collapse collapse"
										data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<p>Carbnb will wash the car for you before pick up. Just ready the
												price for the
												following upon pick up:</p>
											<ul data-v-1a0939d5="">
												<li data-v-1a0939d5=""><b data-v-1a0939d5="">PHP 300</b> for Hatchbacks and
													Sedans.
												</li>
												<li data-v-1a0939d5=""><b data-v-1a0939d5="">PHP 350</b> for MPVs, SUVs,
													Pickups and
													Vans.</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapseThree" aria-expanded="false"
											aria-controls="collapseThree">
											<span class='text-default'>What are the requirements to rent?</span>
										</button>
									</h2>
									<div id="collapseThree" class="accordion-collapse collapse"
										data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<h3 class='text-default'>Requirement - Bring 2 Primary IDs</h3>
											<ul>
												<li>Please be reminded to bring your two primary IDs (including
													your driver's license) with you when you pick up the car.</li>
												<li>The other primary ID presented will be handed to the assigned
													Cebu Carbnb employee and will be released as soon as you return the
													vehicle
													for
													security purposes.</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapseFour" aria-expanded="false"
											aria-controls="collapseFour">
											<span class='text-default'>How about the late return policy?</span>
										</button>
									</h2>
									<div id="collapseFour" class="accordion-collapse collapse"
										data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<h3 class='text-default'>Requirement - Bring 2 Primary IDs</h3>
											We charge <b>PHP 300 pesos</b> per hour maximum of 3 hours extension and
											subject to availability. Please return on time and estimate your travel time
											with the
											best of your ability considering the traffic we have in the Philippines. The
											failure of
											the client to return the car to Carbnb for whatever reason within 24 hours from
											the
											scheduled deadline shall lead to a penalty of <b>PHP 500,000.00</b>
											in addition to the acquisition cost of the vehicle and other fees.
										</div>
									</div>
								</div>

								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapseFive" aria-expanded="false"
											aria-controls="collapseFive">
											<span class='text-default'>How to rent this vehicle for 12 hours?</span>
										</button>
									</h2>
									<div id="collapseFive" class="accordion-collapse collapse"
										data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<p>For safety purposes, please contact a Carbnb agent thru the Contact Us page
												or our Facebook page. if you insist on renting this vehicle for 12 hours
												only.</p>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="col-md-8 block-9 mb-md-5 rounded">
							<div class='d-flex flex-column'>
								<div class='mx-1'>
									<h2 clas='text-default'>Where to pick up the vehicle?</h2>
								</div>
								<div class='mx-1'>
									<p class='mx-1 px-1'>
										<img src="{{asset('images/loc.png')}}" alt="" class=''
											style='width:20px;height:20px;' />
										{{$car[0]->location}}
									</p>

								</div>


							</div>

							<form method="post" action="{{ url('bookingstore') }}" enctype="multipart/form-data"
								class="bg-light p-5 contact-form">
								{{ method_field('POST') }}
								@csrf
								<div class="row">
									<div class='d-flex justify-content-around'>
										<h2 class='text-default'>Book Car Reservation</h2>
									</div>
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<input type="date" name="pickup_date" placeholder=" " class="form-control">
											<p class='text-default'>Pick up date</p>
										</div>
										@error('pickup_date')
											<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
										@enderror
									</div>


									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<input type="date" name="return_date" class="form-control">
											<p class='text-default'>Return Date</p>
										</div>
										@error('return_date')
											<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
										@enderror
									</div>
									<!-- end for model -->

									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<input type="text" name="phone_number" placeholder="Phone Number"
												class="form-control">
										</div>
										@error('phone_number')
											<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
										@enderror
									</div>
									<!-- end for date type-->

									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<input type="text" name="location" placeholder="Location address"
												class="form-control">
										</div>
										@error('location')
											<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
										@enderror
									</div>

									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control" name="client_name"
												placeholder="Your Name" />
											<!-- temporary rate -->
										</div>
										@error('client_name')
											<div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
										@enderror
									</div>
									{{-- end of book date --}}

									<div class='d-flex justify-content-around'>
										<div>
											<img src="{{asset('images/gcash.png')}}" alt="img" class=''
												style="width:125px;height:125px;" />
										</div>
										<div><img src="{{asset('images/visa.png')}}" alt="img"
												style="width:125px;height:125px;" /></div>
										<div><img src="{{asset('images/master-card.webp')}}" alt="img"
												style="width:125px;height:125px;" /></div>
									</div>
									<div class='d-flex flex-column'>

										<div class="border w-100 p-2 rounded ">
											<p class='text-success small'>PHP  {{number_format($car[0]->rate)}}</p>
											<p class='text-black small'>Full Payment Upon Pick Up</p>
										</div>

										<div class="border w-100 p-2 rounded ">
											<p class='text-success small'>PHP 300 </p>
											<p class='text-black small'>Reservation Fee, (Deduction)</p>
										</div>
										<?php
										$rate = $car[0]->rate;
										$reservation = 300;
										$total = $rate - $reservation;
								?>
										<div class="border w-100 p-2 rounded ">
											<p class='text-success small'>PHP  {{number_format($total)}}</p>
											<p class='text-black small'>Total Rental Fee (Inclusive of VAT and payment gateway fee)</p>
										</div>
										
									</div>
									<input type="hidden" name='car_id' value="{{$car[0]->id}}">
									<div class="col-md-6 col-lg-12">
										<button type="submit" class="btn btn-danger" id="submit">Book Now</button>
										<a href="{{url('/')}}" class='btn btn-dark'>Select Another Vehicle</a>
									</div>
								</div>

							</form>

						</div>
					</div>

				</div>
			</section>
			<!-- end for tools icon -->

		</div>

	</section>

	@push('head')
		<!-- Styles -->


	@endpush
@endsection