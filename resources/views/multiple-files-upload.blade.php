@extends('layouts.master')
@section('content')
<div class="container" style="margin-top:10rem;">

  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
    
  
      <h2 class="text-center">Upload Itinerary Package </h2>
    <div class="col-md-8 block-9 mb-md-5"> 
        <form name="save-multiple-files" method="POST"  action="{{ url('save-multiple-files') }}"  enctype="multipart/form-data" class="bg-light p-5 contact-form">
          @csrf
            <div class="row"> 
                <div class="col-md-6 col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" name ="details" placeholder="Details"></textarea>
                    </div>
                    @error('details')
                        <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-12">
                    <div class="form-group">
                        <select name="category" class="form-control">
                            <option value="">Select Category </option>
                            @foreach ($categories  as $cat)
                                <option value="{{$cat->id}}"> {{$cat->category_title}}</option>
                            @endforeach
                        </select>   
                    </div>
                    @error('category')
                        <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-12">
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Title" class="form-control" cols="30" rows="7">
                    </div>
                    @error('title')
                        <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" name ="rate" placeholder="Rate" cols="10" rows="4"></textarea>
                    </div>
                    @error('rate')
                        <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-12">
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
    </div>
    
    
</div>  
@endsection