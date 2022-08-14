<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Default - Mazer Admin Dashboard</title>

    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/main/app-dark.css') }}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <x-sidebar />
        <div id="main" class='layout-navbar'>
            <x-navbar />

            <div id="main-content">

                <div class="page-heading">
                    <x-header />

                    <section>
                        <x-card>
                            <x-card.header title="Dashboard">
                            </x-card.header>
                        </x-card>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('mazer/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/app.js') }}"></script>

</body>

</html>
