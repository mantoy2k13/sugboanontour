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
                <span class="subheading text-default">Add cars</span>
                <?php
    if (Auth::check()) {
        $id = Auth::user()->id;
    } else {
        $id = 0;
    }
                    ?>

            </div>
        </div>
        <div class="row d-flex">
            <form method="post" action="{{ url('cars-store') }}" enctype="multipart/form-data"
                class="bg-light p-5 contact-form">
                {{ method_field('POST') }}
                @csrf
                <div class="row">

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="vehicle_name" placeholder="Make Vehicle " class="form-control">
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
                            <input type="text" name="model" placeholder="Model Name" class="form-control">
                        </div>
                        @error('model')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- end for model -->

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="year" name="year" placeholder="Year" class="form-control">
                        </div>
                        @error('year')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- end for date type-->

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="location" placeholder="Location address" class="form-control">
                        </div>
                        @error('location')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="rate" placeholder="Rate" />
                            <!-- temporary rate -->
                        </div>
                        @error('rate')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">

                            <select name="transmission_type" class="form-control" id="">
                                <option value="">-Please Select Transmission-</option>
                                <option value="manual">Manual</option>
                                <option value="matic"> Matic</option>

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
                                <option value="gasoline">Gasoline</option>
                                <option value="diesel"> Deisel</option>

                            </select>
                        </div>
                        @error('fuel_type')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- end of fuel type --}}
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">

                            <select name="vehicle_type" class="form-control" id="">
                                <option value=""> Please select vehicle type </option>
                                <option value="sedan"> Sedan</option>
                                <option value="suv"> SUV</option>
                                <option value="van"> Van</option>
                                <option value="hatchback">Hatchback</option>
                                <option value="crossover">Cross Over</option>
                                <option value="pickup">Pick Up</option>
                                <option value="coaster">Coaster</option>
                            </select>
                        </div>
                        @error('vehicle_type')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" name='user_id' value="{{$id}}">
                    <div class="col-md-6 col-lg-12">
                        <button type="submit" class="btn btn-primary" id="submit">Add car</button>
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