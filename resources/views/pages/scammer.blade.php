@extends('layouts.master')
@section('container')

    <div class="container">
        <div class="py-5">&nbsp;</div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-4 heading-section text-center ftco-animate">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <span class="subheading text-default"> E post ninyo ang mga scammer og mga rentangay/ carnaper</span>
                

            </div>
        </div>
        <div class="row d-flex">
            <form method="post" action="{{ url('storescammer') }}" enctype="multipart/form-data"
                class="bg-light p-5 contact-form">
                {{ method_field('POST') }}
                @csrf
                <div class="row">

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="name_scammer" placeholder="Pangan sa Scammer " class="form-control">
                        </div>
                        @error('name_scammer')
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
                            <input type="text" name="location_address" placeholder="Location sa Scammer" class="form-control">
                        </div>
                        @error('location_address')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="details_scammer" placeholder="Detalye sa scammer" class="form-control">
                        </div>
                        @error('details_scammer')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <button type="submit" class="btn btn-primary" id="submit">E post ang scammer</button>
                        <a href="{{url('/')}}" class="btn btn-danger">Cancel, back to homepage</a>
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