<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <!-- Sidebar -->
  @include('layouts.sidebar')

  <!-- Main Content -->
  <main class="main">
    @include('layouts.header')
    @yield('Main-content')
  </main>

  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <!-- Global SweetAlert Configuration -->
  <script src="{{ asset('js/global-sweetalert.js') }}"></script>

  <!-- Session Messages for SweetAlert -->
  @if(session('success'))
    <script>
      var sessionSuccess = '{{ session("success") }}';
    </script>
  @endif

  @if(session('error'))
    <script>
      var sessionError = '{{ session("error") }}';
    </script>
  @endif

  @if(session('warning'))
    <script>
      var sessionWarning = '{{ session("warning") }}';
    </script>
  @endif

  @if(session('info'))
    <script>
      var sessionInfo = '{{ session("info") }}';
    </script>
  @endif

  <!-- Scripts -->
  <script src="{{ asset('js/dashboard.js')}}"></script>
</body>

</html>