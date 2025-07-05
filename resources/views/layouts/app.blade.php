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
</head>

<body>
  <!-- Sidebar -->
  @include('layouts.sidebar')



  <!-- Main Content -->
  <main class="main">
    @include('layouts.header')
    @yield('Main-content')
  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/dashboard.js')}}"></script>
</body>

</html>