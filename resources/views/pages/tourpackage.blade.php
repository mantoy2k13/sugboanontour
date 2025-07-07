@extends('layouts.master')
@section('content')
  <?php 
        $imgs = json_decode($trpackage->name, true);
        $tourpackage = ($trpackage->id) ? $trpackage->id : 0;
        
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
          <h3 class="orange">Call: <a href="tel:+63915 097 1513" class="text-default"> 0915 097 1513</a> </h3>
          <h2 class='text-default'>{{ucfirst($trpackage->title)}}</h2>
          
          {!!$trpackage->details!!}
          
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
                <h2 class='text-default'>Book Tour package reservation</h2>
            </div>
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
                  @for ($i = 1; $i<=50; $i++)
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
					<input type="hidden" name = 'tour_id' value="{{$tourpackage}}">
							
						<div class="form-group">
              <div class='d-flex'>
                <div>
                    <input type="submit" value="Book Tour Packages Now" class="btn btn-success">
                </div>
              <div>
                <a href="{{url('cebutour')}}" class='btn btn-dark'>Select Another Tour</a>
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