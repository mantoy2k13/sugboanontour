@extends('layouts.master')
@section('content')
	<?php 
											$imgs = json_decode($trpackage->name, true);
	$tourpackage = ($trpackage->id) ? $trpackage->id : 0;
	if ($trpackage->path == 'oslob') {
		$book = 'Book room reservation';
	} else {
		$book = 'Book tour package reservation';
	}
										?>

	<?php
	$rate = $trpackage->rate;
	$reservation = 30;
	$downpayment = ($rate * $reservation) / 100;
	$total = $rate - $downpayment;
																		?>
	<section class="ftco-section contact-section">
		<div class="container">
			<div class="d-flex justify-content-around">

				<div class="col-md-8 col-lg-8">
					<div class="carousel-car owl-carousel">
						@foreach($imgs as $dis_img)
							<div class="item">
								<div class="car-wrap rounded ftco-animate">
									<div class="img rounded d-flex align-items-end"
										style="background-image: url('{{asset('files/' . $dis_img)}}'); height:450px;width:auto;">
									</div>
									<div class="text">
										<h2 class="mb-0 "><a href="#" class='text-default'>
											</a></h2>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="row d-flex mb-5 contact-info">

				<div class="col-md-6">
					<div class="row mb-5">


						<div class="col-md-12">
							<div class="border w-100  d-flex">
								<div class="sidebar-box ftco-animate">
									<div class="categories">
										<h3 class="orange">Call: <a href="tel:+63915 097 1513" class="text-default"> 0915
												097 1513</a> </h3>
										<h2 class='text-default'>{{ucfirst($trpackage->title)}}
										</h2>
										<?php
	if ($trpackage->path == 'oslob' || $trpackage->path == 'badian' || $trpackage->path == 'moalboal') {
		$rates = 'PHP ' . number_format($trpackage->rate) . ' Per night';
	} else {
		$rates = 'PHP Start ' . number_format($trpackage->rate);
	}
																?>
										<h3 class='text-danger'> {{$rates}}</h3>
										<div class='d-flex flex-row flex-column flex-wrap'>

											{!!$trpackage->details!!}

										</div>
										<!-- this div for hotel only oslob moalboal and badian -->
										@if($trpackage->path == 'oslob' || $trpackage->path == 'moalboal' || $trpackage->path == 'badian')
											<h3 class='text-default'>Check-in and check-out time</h3>
											<p class='text-black'>Check-in: 03:00 pm</p>
											<p class='text-black'>Check-out: 11:00 am</p>
											<h3 class='text-default pt-2'>Bed Types</h3>
											<p>Full Bed: 4.5 * 6.25 sq.ft</p>
											<p>SIngle: 3 * 6.25 sq.ft</p>
											<div class='d-flex flex-row flex-column flex-wrap '>
												<p class='text-default py-2'>ROOM FEATURES</p>
												<div class='d-flex flex-row flex-wrap justify-content-between '>
													<div class=''>
														<ul class='hotel-order'>
															<ol>Air-conditioning</ol>
															<ol>Show Heater</ol>
															<ol>Toiletries</ol>
															<ol>Terrace</ol>
														</ul>
													</div>
													<div class=''>
														<ul class=''>
															<ol>Wi-Fi</ol>
															<ol>Television</ol>
															<ol>Room Service</ol>
															<ol>Free parking</ol>
														</ul>
													</div>
													<div class=''>
														<ul>
															<ol>Mini Pool</ol>
															<ol>Restaurant</ol>
															<ol>Bar</ol>
															<ol>Fish Spa</ol>
														</ul>
													</div>

												</div>
											</div>
											<!--end -->
											<div class='d-flex flex-row flex-column flex-wrap '>
												<p class='text-default py-2'>HOTEL FEATURES</p>
												<div class='d-flex flex-row flex-wrap justify-content-between '>
													<div class=''>
														<ul class='hotel-order'>
															<ol>Business Center</ol>
															<ol>Internet Access</ol>
															<ol>Restaurant</ol>
															<ol>Amphitheatre</ol>
														</ul>
													</div>
													<div class=''>
														<ul class=''>
															<ol>Board Room</ol>
															<ol>Parking</ol>
															<ol>DiscoTheatre</ol>
															<ol>Mini Theatre</ol>
														</ul>
													</div>
													<div class=''>
														<ul>
															<ol>Fax Machine</ol>
															<ol>Terrace</ol>
															<ol>Casino</ol>

														</ul>
													</div>

												</div>
											</div>
											<div class='clearfix'>&nbsp;</div>
											<div class='d-flex flex-row flex-column flex-wrap'>
												<p class='text-default'>HOTEL DESCRIPTION</p>
												<h3 class=''>Welcome to our {{ucfirst($trpackage->title)}}</h3>

												<p class='text-default'>Accommodation:</p>

												<p class='font-weight-lighter'>Indulge in our well-appointed rooms and suites, exquisitely designed to
													provide a tranquil haven after a long day of exploration or meetings. Each
													room is tastefully furnished with modern amenities, including a plush bed, a
													spacious work desk, high-speed Wi-Fi, a TV, and a private bathroom adorned
													with luxurious toiletries.</p>
												<br>
												<p class='text-default'>Dining:</p>
												<p class='font-weight-lighter'>Savor a delightful culinary experience at our onsite restaurant, where our
													world-class chefs craft delectable dishes using the finest ingredients.
													Whether you crave international flavors or local specialties, our diverse
													menu is sure to satisfy every palate. Enjoy a romantic dinner for two or
													gather with friends and family in our inviting dining ambiance</p>
												<br>
												<p class='text-default'>Facilities:</p>
												<p class='font-weight-lighter'>We believe in providing our guests with a range of facilities to enhance
													their stay. Take a refreshing dip in our sparkling swimming pool, work up a
													sweat in our state-of-the-art fitness center, or unwind with a rejuvenating
													spa treatment. Our attentive staff is always on hand to ensure your needs
													are met with utmost care and professionalism.</p>
												<br>
												<p class='text-default'>Events and Meetings:</p>
												<p class='font-weight-lighter'>Host your next corporate event or special occasion in our versatile event
													spaces, equipped with the latest audiovisual technology and flexible seating
													arrangements. From intimate boardroom meetings to grand celebrations, our
													dedicated event planners will assist you in creating a seamless and
													successful gathering.</p>
												<br>
												<p class='text-default'>Events and Meetings:</p>
												<p class='font-weight-lighter'>We are located OSLOB proper area</p>
												<br>
												<p class='text-default'>Hotel Policies:</p>
												<p class='font-weight-lighter'>- Accommodation will only be provided to guests whose details are registered with the hotel front desk.</p>
												<p class='font-weight-lighter'>- Guests are required to show a valid photo identification during check-in.</p>
												<p class='font-weight-lighter'>- GST / Taxes are charged extra and applicable as per government directives.</p>
												<p class='font-weight-lighter'>- 100 % advance Payment deposit at the time of Check-in.</p>
												<p class='font-weight-lighter'>- The check-in time is 3:00 PM & check-out time is 11:00 AM. (Subject to availability, early check-in, and late check-out will be considered)</p>
												<p class='font-weight-lighter'>- The hotel may deny further accommodation to a guest who does not prove to be decent and comply with the hotel policy and rules.</p>
												<p class='font-weight-lighter'>- The guest has to bear any loss caused by them to the hotel property.</p>
											</div>
										@endif
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 block-9 mb-md-5">
					<form action="{{url('booknow')}}" class="bg-light p-5 contact-form" method="POST">
						@csrf
						<div class='d-flex justify-content-center'>

							<h2 class='text-default'> {{$book}}</h2>
						</div>
						<div class='d-flex flex-wrap justify-content-around '>
							<div>
								<img src="{{asset('images/gcash.png')}}" alt="img" class=''
									style="width:125px;height:125px;" />
							</div>
							<div><img src="{{asset('images/visa.png')}}" alt="img" style="width:125px;height:125px;" />
							</div>
							<div><img src="{{asset('images/master-card.webp')}}" alt="img"
									style="width:125px;height:125px;" /></div>
						</div>
						<div class='d-flex flex-column'>

							<div class="border w-100 p-2 rounded ">
								<p class='text-danger small'> {{$rates}}</p>

							</div>

							<div class="border w-100 p-2 rounded ">
								<p class='text-success small'>Downpayment or Reservation 30% </p>
								<p class='text-black small'>{{$downpayment}} Fee, (Deduction)</p>
							</div>

							<div class="border w-100 p-2 rounded ">
								<p class='text-success small'>PHP {{number_format($total)}}</p>
								<p class='text-black small'>Total Fee (Inclusive of VAT and payment gateway fee)</p>
							</div>

						</div>
						<div class='clearfix'>&nbsp;</div>
						<div class="form-group">
							<input type="text" class="form-control" name='fullname' placeholder="Full Name">
							@error('fullname')
								<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name='email' placeholder="Email address">
							@error('email')
								<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<p class='text-default'>Booking Date</p>
							<input type="date" class="form-control" name='booking_date' placeholder="Booking Date">

							@error('booking_date')
								<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name='phone_number' placeholder="Phone Number">
							@error('phone_number')
								<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<select name="no_of_pax" id="no_of_pax" class='form-control'>
								<option value="">Select Pax</option>
								@for ($i = 1; $i <= 20; $i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
							@error('no_of_pax')
								<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<textarea name="message" id="" cols="30" rows="7" class="form-control"
								placeholder="Message"></textarea>
						</div>
						<input type="hidden" name='tour_id' value="{{$tourpackage}}">

						<div class="form-group">
							<div class='flex-row'>
								<div class='py-2'>
									<?php
	$book_now = ($trpackage->path == 'oslob' || $trpackage->path == 'badian' || $trpackage->path == 'moalboal') ? 'Book Room' : 'Book Tour Packages Now';
																	?>
									<input type="submit" value="{{$book_now}}" class="btn btn-success w-100">
								</div>
								<div>
									<a href="{{url('cebutour')}}" class='btn btn-dark w-100'>Select Another Tour</a>
								</div>

							</div>

						</div>
					</form>

				</div>
			</div>

		</div>
	</section>

	@push('head')
		<!-- Styles -->


	@endpush
@endsection