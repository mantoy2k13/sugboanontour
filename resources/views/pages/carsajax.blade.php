@extends('layouts.master')
@section('content')

<div class="container">
    <div class="py-5" >&nbsp;</div>
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Our Cars</span>    
                <h2>Sedan SUV VAN LUXURY</h2>
                <h3>Add Cars</h3>
          </div>
        </div>
        <div class="row d-flex">
          
          @foreach($tours as $tour)
          <?php 
            $img = json_decode($tour->name, true);
            $img_back = asset('files/'.$img[0]);
           
          ?>
            
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="{{ url('tourpackage')}}/{{$tour->id}}" class="block-20" style="background-image: url('{{$img_back}}');">
              </a>
              <div class="text pt-4">
                <h3 class="heading mt-2"><a href="{{ url('tourpackage')}}/{{$tour->id}}"> {{ $tour->title}}</a></h3>
                <p><a href="{{ url('tourpackage')}}/{{$tour->id}}" class="btn btn-primary">View more</a></p>
              </div>
            </div>
          </div>
          @endforeach
    <!-- 2000 56095 787 promisory note-->
        </div>
      </div>
      @push('head')
<!-- Styles -->

<script src="{{ asset('js/components/pizza.js')}}"></script>
@endpush
@endsection

 