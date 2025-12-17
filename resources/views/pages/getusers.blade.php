@extends('layouts.master')
@section('content')

    <section class="ftco-section contact-section">
        <div class="container">
			 <div id='calendar'>Calendar</div>
            <div class="row d-flex mb-5 contact-info">
                	<form action="{{url('/getallinfos')}}" class="bg-light p-5 contact-form" method="GET">
						@csrf
						<div class="form-group">
							<input type="text" class="form-control" name='search' placeholder="Search">
							@error('search')
								<div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
							@enderror
						</div>
						
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
						</div>
					</form>

               
            </div>

        </div>
    </section>
@section('script')

	<script type="text/javascript">

		 document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/api/events', // Route to fetch events from your Laravel controller
                // ... other FullCalendar options and event handlers
            });
            calendar.render();
        });
		console.log('way klaro');
	</script>
@endsection
    @push('head')
        <!-- Styles -->

	<script src="{{ asset('js/custom.js')}}"></script>
    @endpush
@endsection