@extends('layouts.master')
@section('content')
<section class="ftco-section ftco-cart">
   
    <div class="container py-5">
        <div class="row">
                <?php 
                    $id = (Auth::check()) ? Auth::user()->id :  0 ;
                ?>
                @if(session('success'))
                    <h1>{{session('success')}}</h1>
                @endif
            <div class='flex'>
                <a href="{{url('/cars')}}" class="btn btn-primary"> Add Cars</a>      
            </div>
        </div>
    </div>
    
</section>
@endsection

@push('head')


<!-- Scripts -->

<script src="{{ asset('js/custom.js')}}"></script>

@endpush