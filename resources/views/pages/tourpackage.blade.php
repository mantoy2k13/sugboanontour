@extends('layouts.master')
@section('content')
<?php 
$imgs = json_decode($trpackage->name, true);
$tourpackage = ($trpackage->id) ? $trpackage->id : 0 ;
?>
<div class="container mt-5">

<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
            

          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3 orange">{{$trpackage->title}} </h2>
            @foreach($imgs as $image )
            <img src="{{ asset('files/'.$image)}}" alt="" class="img-fluid mt-3">
            @endforeach
           <!-- end loop for images-->
          

          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3 class="orange">Call: <a href="tel:+63915 097 1513" class="orange"> 0915 097 1513</a> </h3>
                {!!$trpackage->details!!}
                <h3 class="mb-3"> </h3>
              </div>
            </div>
            <div class="sidebar-box ftco-animate">
              <div class="comment-form-wrap ">
                <h3 class="mb-5">Book now</h3>
                <form method="POST" action="{{ url('booknow')}}" class=" bg-light">
                  @csrf
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name"class="form-control" id="name">
                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1 ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="contact">Contact Number *</label>
                    <input type="text" name="contact_number" class="form-control" id="contact_number">
                    @error('contact_number')
                        <div class="alert alert-danger mt-1 mb-1 ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="contact">Contact Number *</label>
                    <input type="text" name="contact_number" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="tourpackage" value="{{$tourpackage}}">
                    <input type="submit" value="Book" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>
        </div>
      </div>
    </section> <!-- .section -->

</div>
@endsection