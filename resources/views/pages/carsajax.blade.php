@extends('layouts.master')
@section('content')

<div class="container">
    <div class="py-5" >&nbsp;</div>
        <div class="row justify-content-center mb-5">
          <div class="col-md-4 heading-section text-center ftco-animate">
          	<span class="subheading">Pls add car</span>    
                
          </div>
        </div>
        <div class="row d-flex">
           <form name="addcars" method="POST"  action="{{ url('cars') }}"  enctype="multipart/form-data" class="bg-light p-5 contact-form">
          @csrf
            <div class="row"> 
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <textarea class="form-control" name ="details" placeholder="Details"></textarea>
                    </div>
                    @error('details')
                        <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <select name="category" class="form-control">
                            <option value="">Select Category </option>
                            
                        </select>   
                    </div>
                    @error('category')
                        <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Title" class="form-control" cols="30" rows="7">
                    </div>
                    @error('title')
                        <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name ="rate" placeholder="Rate"  />
                    </div>
                    @error('rate')
                        <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <input type="file" name="filenames[]" placeholder="Choose files" multiple class="form-control">
                    </div>
                    @error('filenames')
                        <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 col-lg-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>     
        </form>
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

 