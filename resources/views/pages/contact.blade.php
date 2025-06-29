@extends('layouts.master')
@section('content')

	<section class="ftco-section contact-section">
		<div class="container">
			<div class="row d-flex mb-5 contact-info">
				@if(session('success'))
					<div class="col-md-12 ">
						<div class="alert alert-success" role="alert">
							<p class='text-default'>{{ session('success') }}</p>
						</div>
						
					</div>
				@endif
				<div class="col-md-4">
					<div class="row mb-5">
						<div class="col-md-12">
							<div class="border w-100 p-4 rounded mb-2 d-flex">
								<div class="icon mr-3">
									<span class="icon-map-o"></span>
								</div>
								<p><span>Address:</span> Jones Osmena Blv street.</p>
							</div>
						</div>
						<div class="col-md-12">
							<div class="border w-100 p-4 rounded mb-2 d-flex">
								<div class="icon mr-3">
									<span class="icon-mobile-phone"></span>
								</div>
								<p><span>Phone:</span> <a href="tel:+639150971513">+63915 097 1513</a></p>
							</div>
						</div>
						<div class="col-md-12">
							<div class="border w-100 p-4 rounded mb-2 d-flex">
								<div class="icon mr-3">
									<span class="icon-envelope-o"></span>
								</div>
								<p><span>Email:</span> <a href="mailto:info@yoursite.com">cebucarbnb@gmail.com</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 block-9 mb-md-5">
					<form action="{{url('/addcontact')}}" class="bg-light p-5 contact-form" method="POST">
						@csrf
						<div class="form-group">
							<input type="text" class="form-control" name='name' placeholder="Your Name">
							@error('name')
								<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name='phonenumber' placeholder="Phone Number">
							@error('phonenumber')
								<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name='email' placeholder="Your Email">
							@error('email')
								<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name='subject' placeholder="Subject">
							@error('subject')
								<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<textarea name="message" id="" cols="30" rows="7" class="form-control"
								placeholder="Message"></textarea>
						</div>
						@error('message')
							<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
						@enderror
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
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