@extends('layouts.master')
@section('content')

    <div class="container">

        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Inquiry Booked</span>

            </div>
        </div>
        <section class="ftco-section ftco-cart">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12 ftco-animate">
                        <div class="car-list">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th class="bg-primary heading">Own.Location</th>
                                        <th class="bg-dark heading">Pick Up Date</th>
                                        <th class="bg-black heading">Leasing</th>
                                        <th class="bg-black heading">C.Location</th>
                                        <th class="bg-black heading">C.Number</th>
                                        <th class="bg-black heading">C.Name</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($bookings as $book)
                                    <?php
                                    $car_img = json_decode($book->img, true);
                                    ?>
                                    <tr class="">
                                        <td class="car-image border">
                                            <div class="img" style="background-image:url('{{asset('files/' . $car_img[0])}}');"></div>
                                        </td>
                                        <td class="product-name">
                                            <h3>{{$book->vehicle}} {{$book->model}}</h3>
                                           
                                        </td>

                                        <td class="border">

                                            <div class="price-rate">
                                              <p> {{$book->location_owner}}</p>
                                            </div>
                                        </td>

                                        <td class="border">
                                          <p> {{ date('F, d Y', strtotime($book->pick_date));}}</p>
                                        </td>

                                        <td class="border">
                                             <p> {{ date('F, d Y', strtotime($book->return_date));}}</p>
                                        </td>
                                        <td class="border">
                                             <p>{{$book->client_location}}</p>
                                        </td>
                                        <td class="border">
                                             <p>{{$book->number}}</p>
                                        </td>
                                        <td class="border">
                                             <p>{{$book->name}}</p>
                                        </td>
                                    </tr><!-- END TR-->
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection