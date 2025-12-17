@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="py-5">&nbsp;</div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-4 heading-section text-center ftco-animate">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <span class="subheading text-default">Update cars</span>
                <?php
    if (Auth::check()) {
        $id = Auth::user()->id;
    } else {
        $id = 0;
    } { {
            $car_id = ($car[0]->id) ? $car[0]->id : 0;
        }
    }
                            ?>

            </div>
        </div>
        <div class="row d-flex">
            <form method="post" action="{{ url('car/updateall') }}" enctype="multipart/form-data"
                class="bg-light p-5 contact-form">
                {{ method_field('POST') }}
                @csrf
                <div class="row">

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="vehicle_name" placeholder="Make Vehicle " class="form-control"
                                value="{{$car[0]->name}}">
                        </div>
                        @error('vehicle_name')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="file" name="filenames[]" placeholder="Choose image" multiple class="form-control">
                        </div>
                        @error('filenames')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="model" placeholder="Model Name" class="form-control"
                                value="{{$car[0]->model}}">
                        </div>
                        @error('model')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- end for model -->

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="year" name="year" placeholder="Year" class="form-control"
                                value="{{$car[0]->year}}">
                        </div>
                        @error('year')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- end for date type-->

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="location" placeholder="Location address" class="form-control"
                                value="{{$car[0]->location}}">
                        </div>
                        @error('location')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="rate" placeholder="Rate"
                                value="{{$car[0]->book_date}}" />
                            <!-- temporary rate -->
                        </div>
                        @error('rate')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- end of book date --}}
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">

                            <select name="transmission_type" class="form-control" id="">
                                <option value="">-Please Select Transmission-</option>
                                <option value="manual" <?php if ($car[0]->t_type == 'manual')
        echo 'selected="selected"';?>>
                                    Manual</option>
                                <option value="matic" <?php if ($car[0]->t_type == 'matic')
        echo 'selected="selected"';?>>
                                    Matic</option>

                            </select>
                        </div>
                        @error('transmission_type')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- end of transmission --}}
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">

                            <select name="fuel_type" class="form-control" id="">
                                <option value="">-Please Select Fuel Type-</option>
                                <option value="gasoline" <?php if ($car[0]->f_type == 'gasoline')
        echo 'selected="selected"';?>>Gasoline</option>
                                <option value="diesel" <?php if ($car[0]->f_type == 'diesel')
        echo 'selected="selected"';?>>
                                    Deisel</option>

                            </select>
                        </div>
                        @error('fuel_type')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- -end of fuel type --}}
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">

                            <select name="vehicle_type" class="form-control" id="">
                                <option value=""> Please select vehicle type </option>
                                <option value="sedan" <?php if ($car[0]->vehicle_type == 'sedan')
        echo 'selected="selected"';?>> Sedan</option>
                                <option value="suv" <?php if ($car[0]->vehicle_type == 'suv')
        echo 'selected="selected"';?>>
                                    SUV</option>
                                <option value="van" <?php if ($car[0]->vehicle_type == 'van')
        echo 'selected="selected"';?>>
                                    Van</option>
                                <option value="hatchback" <?php if ($car[0]->vehicle_type == 'hatchback')
        echo 'selected="selected"';?>>Hatchback</option>
                                <option value="crossover" <?php if ($car[0]->vehicle_type == 'crossover')
        echo 'selected="selected"';?>>Cross Over</option>
                                <option value="pickup"<?php if ($car[0]->vehicle_type == 'pickup')
        echo 'selected="selected"';?>>Pick Up</option>
                                <option value="coaster" <?php if ($car[0]->vehicle_type == 'coaster')
        echo 'selected="selected"';?>>Coaster</option>
                            </select>
                        </div>
                        @error('vehicle_type')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" name='car_id' value="{{$car_id}}">
                    <div class="col-md-6 col-lg-12">
                        <button type="submit" class="btn btn-success" id="submit" role="button">Update Car</button>
                        <a href="{{url('/dashboard')}}" class="btn btn-danger">Cancel, back to dashboard</a>
                    </div>
                </div>

            </form>

            <!-- 2000 56095 787 promisory note-->
        </div>
    </div>
    @push('head')
        <!-- Styles -->


    @endpush
@endsection