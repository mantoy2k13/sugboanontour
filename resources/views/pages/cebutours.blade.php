@extends('layouts.master')
@section('content')

<div class="container">
    <div class="py-5" >&nbsp;</div>
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Our Hotels</span>
            <h2>Economy/Luxury</h2>
          </div>
        </div>
        <div class="row d-flex">
          
              @foreach($tours as $tour)
              <?php 
                $img = json_decode($tour->name, true);
              ?>
                
              <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                  <a href="{{ url('tourpackage')}}/{{$tour->id}}" class="block-20" style="background-image: url('carbnb/public/files/{{$img[0] }}');">
                  </a>
                  <div class="text pt-4">
                    <h3 class="heading mt-2"><a href="{{ url('tourpackage')}}/{{$tour->id}}"> {{ $tour->title}}</a></h3>
                    <p><a href="{{ url('tourpackage')}}/{{$tour->id}}" class="btn btn-primary">View more</a></p>
                  </div>
                </div>
              </div>
              @endforeach
        
        </div>
      </div>
@endsection
 