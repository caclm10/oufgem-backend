<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle', '')</title>

    @stack('head-before')
    {{-- <link rel="shortcut icon" href="{{ asset('mazer/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/logo/favicon.png') }}" type="image/png"> --}}
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/main/app-dark.css') }}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @stack('head-after')
</head>

<body>
    <div id="app">
        <x-sidebar />
        <div id="main" class='layout-navbar'>
            <x-navbar />

            <div id="main-content">

                <div class="page-heading">

                    @yield('content')
                </div>

            </div>
        </div>
    </div>

    @routes
    @stack('scripts-before')
    <script src="{{ asset('mazer/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/app.js') }}"></script>
    @stack('scripts-after')

    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire(
                    'Good job!',
                    `{{ session('success') }}`,
                    'success'
                )
            })
        </script>
    @endif

</body>

</html>
