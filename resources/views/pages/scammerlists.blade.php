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
                                        <th>Picture </th>
                                        <th>Name sa scammer</th>
                                        <th>Detalye</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($scammers as $scammer)
                                    <?php
                                    $scammer_img= json_decode($scammer->img_scammer, true);
                                    ?>
                                    <tr class="">
                                        <td class="">
                                            
                                            <a href="{{ asset('files/'.$scammer_img[0]) }}" target="_blank">
                                                <img src="{{ asset('files/'.$scammer_img[0]) }}" class="img" alt="" style="width:200px;height:200px;">
                                            </a>
                                            
                                        </td>
                                        <td class="">
                                            <p>{{ $scammer->name_scammer }}</p>
                                        </td>

                                        <td class="border">

                                            <div class="">
                                              <p><p>{{ $scammer->details }}</p></p>
                                            </div>
                                        </td>

                                        <td class="border">
                                          <p></p>
                                        </td>
                                        <td class="border">
                                          <p></p>
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