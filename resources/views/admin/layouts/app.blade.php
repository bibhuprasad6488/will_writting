<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }} </title>

    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div id="app" class="sb-nav-fixed">
        @include('admin.layouts.header')
        <div id="layoutSidenav">
            @include('admin.layouts.sidebar')
            <div id="layoutSidenav_content">
                <main class="py-4">
                    @yield('content')
                </main>
                {{-- @include('admin.layouts.footer') --}}
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    {{-- <script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script> --}}
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <!-- Your custom script to toggle the dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the dropdown element
            let dropdownElement = document.getElementById('navbarDropdown');

            // Check if the dropdown element exists
            if (dropdownElement) {
                // Initialize the Bootstrap dropdown component
                let dropdown = new bootstrap.Dropdown(dropdownElement);

                // Add a click event listener to toggle the dropdown on click
                dropdownElement.addEventListener('click', function(e) {
                    // Prevent the default action of the anchor tag (i.e., navigation)
                    e.preventDefault();

                    // Toggle the dropdown using Bootstrap's API
                    dropdown.toggle();
                });
            }
        });
    </script>
</body>

</html>
