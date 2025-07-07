@extends('layouts.master')
@section('content')

    <section class="ftco-section contact-section">
        <div class="container">

            <div class="row d-flex mb-5 contact-info">
                <form action="{{url('/getallinfos')}}" class="bg-light p-5 contact-form" method="GET">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name='search' placeholder="Search">
                        @error('search')
                            <div class="alert alert-danger mt-1 mb-1 col-lg-6 ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

                <div class="col-md-8 block-9 mb-md-5">
                    @if($results == 'getusers')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">pass</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->fullname}}</td>
                                            <td>{{$user->pass}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endif


                    @if($results == 'contacts')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->fullname}}</td>
                                            <td>{{$user->location}}</td>
                                            <td>{{$user->number}}</td>
                                            <td>{{$user->message}}</td>
                                            <td>{{ date('Y-m-d', strtotime($user->date))}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endif
                    @if($results == 'gettours')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Per Head</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->fullname}}</td>
                                            <td>{{$user->booking_date}}</td>
                                            <td>{{$user->perhead}}</td>
                                            <td>{{$user->number}}</td>
                                            <td>{{ date('Y-m-d', strtotime($user->date)) }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <!-- end of tables-->

            <div class='d-flex align-items-center justify-content-center'>

                <div class='d-flex '>

                    <ul class='pagination'>

                        @if ($users->onFirstPage())
                            <li class="page-item disabled"><span class='page-link'> Previous</span></li>
                        @else
                            <li class='page-item'>
                                <a class="page-link" href="{{ $users->withQueryString()->previousPageUrl() }}">Prev</a>
                            </li>
                        @endif



                        @foreach ($users as $element)

                            @if (is_string($element))
                                <li class="page-item disabled"><span>{{ $element }}</span></li>
                            @endif



                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $users->currentPage())
                                        <li class="page-item active"><span>{{ $page }}</span></li>
                                    @else
                                        <li class='page-item'><a href="{{ $url }}" class='page-link'>{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach



                        @if ($users->hasMorePages())
                            <li class='page-item'>
                                <a class="page-link" href="{{ $users->withQueryString()->nextPageUrl() }}">Next</a>
                            </li>
                        @else
                            <li class="page-link"><span>Next</span></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>


    </section>

    @push('head')
        <!-- Styles -->


    @endpush
@endsection