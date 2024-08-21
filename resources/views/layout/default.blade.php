<!DOCTYPE html>
<html lang="en" data-coreui-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ngwe Khin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.1.0/dist/js/coreui.bundle.min.js"
        integrity="sha384-fb63TspjFf2/L20tRe69tGsAXArSQe9u0yJ/9+5w1jbov1NYHiDv/+4Rdh2FSnEd" crossorigin="anonymous">
    </script>
    @vite(['resources/scss/style.scss', 'resources/js/app.js'])
    @stack('deps')
</head>

<body>
    @yield('overlay')
    @yield('sidebar')

    <div class="wrapper d-flex flex-column min-vh-100">
        @yield('header')
        <div class="container-lg px-4">
            @yield('content')
        </div>
        @yield('footer')
    </div>
    @stack('scripts')
</body>

</html>
