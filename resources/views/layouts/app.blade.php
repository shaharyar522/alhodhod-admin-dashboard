<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">       

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

  {{-- this is the arabic input handler --}}
  <script src="{{ asset('js/arabic-input-handler.js') }}"></script>

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
{{-- uay hamray pass csrf token ka time period hian jo ky hum data ko store krany k leuy w8 krty hian 10 minutes krty hian 
 --}}
  <script>
// Improved CSRF Token Refresh System
function refreshCSRFToken() {
    fetch("{{ route('refresh.csrf') }}", {
        credentials: "same-origin"
    })
    .then(response => response.json())
    .then(data => {
        // Update meta tag
        const metaTag = document.querySelector('meta[name="csrf-token"]');
        if (metaTag) {
            metaTag.setAttribute('content', data.csrfToken);
        }
        
        // Update all hidden CSRF input fields
        document.querySelectorAll('input[name="_token"]').forEach(function(input) {
            input.value = data.csrfToken;
        });
        
        console.log('CSRF token refreshed successfully');
    })
    .catch(error => {
        console.error('Error refreshing CSRF token:', error);
    });
}

// Refresh token every 3 minutes (before it expires)
setInterval(refreshCSRFToken, 180000); // 3 minutes

// Refresh token when user becomes active (returns to tab)
document.addEventListener('visibilitychange', function() {
    if (!document.hidden) {
        refreshCSRFToken();
    }
});

// Refresh token before form submission
document.addEventListener('submit', function(e) {
    if (e.target.tagName === 'FORM') {
        // Refresh token before submitting
        refreshCSRFToken();
        
        // Small delay to ensure token is updated
        setTimeout(() => {
            // Continue with form submission
        }, 100);
    }
});

// Initial token refresh
refreshCSRFToken();
</script>
</body>

</html>