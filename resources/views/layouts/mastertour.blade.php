<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Daryl Bargamento">
  <meta http-equiv="Permissions-Policy" content="interest-cohort=()">
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sugboanon Car rental Travel & Tours</title>

  @include('partials.styles')
</head>
<body>
    
@include('partials.header')

<main class="container ">
    @yield('content')
</main>

@include('partials.footer')

@include('partials.scripts')
      
</body>
</html>