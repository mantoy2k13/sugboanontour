@extends('layouts.master')
@section('content')
<section class="ftco-section ftco-cart">
    
    <div class="container py-5">
       
        <div class="row">
        <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
            <div class="car-list">
                <table class="table">
                    <thead class="thead-primary">
                      <tr class="text-center">
                        <th>&nbsp;</th>
                        <th class="bg-primary heading">Itinerary's</th>

                        <th class="bg-dark heading" colspan="2">Action</th>
                        <th class="">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($tours as $tour)
                        <?php
                            $tour_img = json_decode($tour->name);
                            $dsplay_img = asset('files/'.$tour_img[0]);
                            $url_view = url('tourpackage/'.$tour->id);
                        ?>

                        <tr class="">
                            <td class="car-image">
                                <a href="{{ url('tourpackage')}}/{{$tour->id}}">
                                    <div class="img" style="background-image:url('{{ $dsplay_img}}');">
                                    </div>
                                </a>
                                </td>
                          <td class="product-name">
                              <h3 class="px-4 subheading"> {{ $tour->title}}</h3>
                              <p class="mb-0 rated">

                                  <span class="ion-ios-star"></span>
                              </p>
                          </td>
                          <td>
                            <a href="{{$url_view}}" target="_blank" class="btn btn-primary">View</a>
                          </td>

                           <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                           </td>
                        </tr>
                        @endforeach
                        <!--END tr -->
                    </tbody>
                  </table>
              </div>
        </div>
    </div>
    </div>
    
</section>
@endsection
