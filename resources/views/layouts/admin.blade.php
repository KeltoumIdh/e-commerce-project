<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <link href="{{ asset('admin/css/material-dashboard.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/css/custom.css')}}" rel="stylesheet" />



    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body >
    <div class="wrapper">
        @include('layouts.inc.sidebare')
        <div class="main-panel">
            @include('layouts.inc.adminnav')
        <div class="content ">
            @yield('content')
        </div>
        @include('layouts.inc.adminfooter')
        </div>
    </div>
    {{-- <div class="wrapper">
        <div class="sidebar">
            @include('layouts.inc.sidebare')
        </div>
        <div class="main-panel">
            @include('layouts.inc.adminnav')
        </div>
        <div class="content">
            @yield('content')
        </div>
        <div class="admin-footer">
            @include('layouts.inc.adminfooter')
        </div>
    </div> --}}





{{-- alert sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('status'))
    <script>
        Swal.fire(
            'Good job!',
            '{{ session('status') }}',
            'success'
)
    </script>
    @endif

    <!-- Assurez-vous d'inclure les fichiers CSS et JavaScript de Bootstrap -->

<!-- Incluez jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluez le fichier JavaScript de Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Votre code HTML -->

<!-- Ajoutez le code JavaScript suivant pour initialiser les fonctionnalités du dropdown -->
<script>
  $(document).ready(function() {
    // Initialiser les fonctionnalités du dropdown
    $('.dropdown-toggle').dropdown();
  });
</script>



<!-- Scripts -->
    <link href="{{ asset('admin/js/jquery.min.js')}}" rel="stylesheet" />
    <link href="{{ asset('admin/js/popper.min.js')}}" rel="stylesheet" />
    <link href="{{ asset('admin/js/bootstrap-material-design.min.js')}}" rel="stylesheet" />
    <link href="{{ asset('admin/js/perfect-scrollbar.jquery.min.js')}}" rel="stylesheet" />

    @yield('scripts')
</body>
</html>
