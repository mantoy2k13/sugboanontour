@extends('layouts.master')
@section('container')

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
                                <thead class="">
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th class="">Own.Location</th>
                                        <th class="">Pick Up Date</th>
                                        <th class="">Leasing</th>
                                        <th class="">C.Location</th>
                                        <th class="">C.Number</th>
                                        <th class="">C.Name</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($mybookings as $book)
                                    <?php
                                    $car_img = json_decode($book->img, true);
                                    ?>
                                    <tr class="">
                                        <td class="car-image border">
                                            <div class="img" style="background-image:url('{{asset('carbnb/public/files/' . $car_img[0])}}');"></div>
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