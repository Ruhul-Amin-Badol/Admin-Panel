<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{ strip_tags( get_option('description')) }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

  <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/frontend/assets/img/logo/Logo.webp') }}">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('theme/frontend/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme/frontend/assets/css/bintel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme/frontend/assets/css/custom.css') }}" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="{{ asset('theme/frontend/assets/css/plugin.css') }}" rel="stylesheet" type="text/css">

    <!-- Flaticon CSS -->
    <link href="{{ asset('theme/frontend/assets/fonts/flaticon.css') }}" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">

    <!-- Remixicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;700&display=swap" rel="stylesheet">

    <!-- Line Icons -->
    <link href="{{ asset('theme/frontend/assets/fonts/line-icons.css') }}" rel="stylesheet" type="text/css">
  
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1THY1BY8GY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1THY1BY8GY');
</script>

</head>

<body style="background-image: url('{{ asset('theme/frontend/assets/images/2.png') }}'); background-size: cover;">
@include('frontend.include.blogs.header')

@yield('content')

@include('frontend.include.blogs.footer')

<!-- All Script JS Plugins here -->
<!-- jQuery -->
<script src="{{ asset('theme/frontend/assets/js/jquery-3.5.1.min.js') }}"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JS -->
<script src="{{ asset('theme/frontend/assets/js/plugin.js') }}"></script>

<!-- CKEditor -->
<script src="{{ asset('theme/frontend/assets/js/ckeditor.js') }}"></script>

<!-- Custom Scripts -->
<script src="{{ asset('theme/frontend/assets/js/main.js') }}"></script>
<script src="{{ asset('theme/frontend/assets/js/custom-swiper.js') }}"></script>
<script src="{{ asset('theme/frontend/assets/js/custom-nav.js') }}"></script>


@yield('scripts')
@if(session('success') || session('error') || session('warning') || session('message'))
    <script>
        $(document).ready(function() {
            const message = '{{ session('success') ?? session('error') ?? session('warning') ?? session('message') }}';
            const type = '{{ session('success') ? 'success' : (session('error') ? 'error' : (session('warning') ? 'warning' : 'message')) }}';
            showToast(message, type);
        });
    </script>
@endif

</body>

</html>
