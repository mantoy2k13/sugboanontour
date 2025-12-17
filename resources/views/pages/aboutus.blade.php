@extends('layouts.master')
@section('content')
    <section class="ftco-section ftco-about ">
        <div class="container">
            <div class="row no-gutters p-5">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center rounded-lg"
                    style="background-image: url('{{ asset('images/about.jpg') }}');">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section heading-section-white pl-md-5">
                        <span class="subheading">About us</span>
                        <h3 class="mb-4">Our Vision</h2>

                            <p>Elevate and broaden our reach across the nation as a pioneering peer-to-peer car rental
                                platform to drive digital innovations and seamlessly connect explorers with the freedom of
                                self-drive adventures.</p>

                            <h3>Our Services</h2>
                                <p> Professional Staff & Operator
                                    We assure our staffs are friendly, accomodating, highly trained and knowledgeable in the
                                    car industry. Providing a smooth and hassle-free transaction to our beloved clients</p>
                                <h3>Car Availability</h3> 
                                <p>Carbnb offers a wide range of car varieties, from Hatchback, Sedan, MPV, SUV, Pick-Up and
                                    Van. Available in manual or automatic transmission.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('head')


    <!-- Scripts -->

    <script src="{{ asset('js/custom.js')}}"></script>

@endpush