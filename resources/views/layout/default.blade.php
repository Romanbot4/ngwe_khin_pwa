<!DOCTYPE html>
<html lang="en" data-coreui-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ngwe Khin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.1.0/dist/js/coreui.bundle.min.js" integrity="sha384-fb63TspjFf2/L20tRe69tGsAXArSQe9u0yJ/9+5w1jbov1NYHiDv/+4Rdh2FSnEd" crossorigin="anonymous"></script>
    @vite(['resources/scss/style.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
        <div class="sidebar-header border-bottom">
            <div class="sidebar-brand">
                <img src="{{ asset('assets/brand/wordmark.svg') }}" alt="Ngwe Khin" srcset=""
                    class="sidebar-brand-full" width="88" height="32">
            </div>
        </div>
        @include("sidebar.sidebar")
    </div>

    <div class="wrapper d-flex flex-column min-vh-100">
        @yield('header')
        @yield('content')
        @yield('footer')
    </div>

</body>

</html>
