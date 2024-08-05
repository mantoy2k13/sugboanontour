@extends('layouts.master')
@section('content')

<div class="container">
<?php 

use App\Models\File;
  // $tours = $tours = DB::table('files')->whereIn('category', [2,3,4,5,6])->get();
  
    $tours = array();
  
?>
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Our Tours</span>
            <h2>Best Seller</h2>  
            <input type="text" name="searchtour" placeholder="Search Tour" id="searchtour"> 
          </div>
        </div>
        <div class="row d-flex">
          
          @foreach($tours as $tour)
          <?php 
            $img = json_decode($tour->name, true);
          ?>
           
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="{{ url('tourpackage')}}/{{$tour->id}}" class="block-20" style="background-image: url('files/{{$img[0] }}');">
              </a>
              <div class="text pt-4">
                <h3 class="heading mt-2"><a href="{{ url('tourpackage')}}/{{$tour->id}}"> {{ $tour->title}}</a></h3>
                <p><a href="{{ url('tourpackage')}}/{{$tour->id}}" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
        
          @endforeach
        

        </div>
      </div>
      
@endsection

@push('head')


<!-- Scripts -->
<script src="{{ asset('js/custom.js')}}"></script>
@endpush