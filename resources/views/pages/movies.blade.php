@extends('layouts.master')
@section('container')

<div class="container">
    <div class="embed-responsive embed-responsive-21by9">
        {{$mov = asset('files/movies/jackal_s01e01')}}
        @if(file_exists($mov)  )
            
            <h1>true</h1>
        @endif
        <iframe class="embed-responsive-item" src="{{asset('files/movies/jackal_s01e01.mp4')}}"></iframe>
    </div>
</div>
@endsection
 