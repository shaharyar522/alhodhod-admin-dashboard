<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

  <title>Alhodhod – Islamic Dreams Interpretation Dashboard</title>
  <!-- Google Font -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Amiri:wght@400;700&display=swap"
    rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <!-- Custom Dashboard Styles -->
  <link rel="stylesheet" href="{{ asset('styling/dashboard.css')}}">
  <!-- Global Action Buttons CSS -->
  <link rel="stylesheet" href="{{ asset('styling/action-buttons.css')}}">
  <!-- CSRF Token -->

</head>

<body>
  <!-- Sidebar -->
  @include('layouts.sidebar')

  <!-- Main Content -->
  <main class="main">
    @include('layouts.header')
    @yield('Main-content')
  </main>

  <

  {{-- this is the arabic input handler --}}
  <script src="{{ asset('js/arabic-input-handler.js') }}"></script>

  <!-- Session Messages for SweetAlert -->
  
  <!-- Scripts -->
  <script src="{{ asset('js/dashboard.js')}}"></script>
{{-- uay hamray pass csrf token ka time period hian jo ky hum data ko store krany k leuy w8 krty hian 10 minutes krty hian 
 --}}
 {{-- sweet alert script --}}
 <!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>